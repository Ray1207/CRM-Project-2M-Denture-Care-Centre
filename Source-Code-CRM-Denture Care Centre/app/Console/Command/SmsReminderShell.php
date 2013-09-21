<?php

class SmsReminderShell extends AppShell {
	public $uses = array('Appointment','Patient');
    public function main() {
    	    date_default_timezone_set('Australia/Victoria');
             //Get the appointments in 5 days
    	     $todayDate = date("Y-m-d");
    	    $fiveDate = strtotime(date("Y-m-d", strtotime($todayDate)) . " +5 day");
    	    
    	    $conditions = array('Appointment.startTime BETWEEN ? AND ?' => array($todayDate,$fiveDate));
            $appointments = $this->Appointment->find('all',array('conditions' =>$conditions));
            if(empty($appointments)) return;
            
            for ($a=0; count($appointments)> $a; $a++)
            {
            	    $startTime=$appointments[$a]['Appointment']['startTime'];
            	    $endTime=$appointments[$a]['Appointment']['endTime'];
            	    $patientId=$appointments[$a]['Appointment']['patient_id'];
            	    
            	    $patients=$this->Patient->find('all',array('conditions' => array ('Patient.patient_id =' => $patientId)));
            	    
            	    if(!empty($patients))
            	    {
            	    	    
            	    	    $phoneNumber=$patients['Patient']['mobile'];
            	    	    //number format problem??
            	    	    //sms embeded code
            	    	    $username = 'Enamel19'; 
                            $password = '55320704'; 
                            $destination = $phoneNumber; 
                            $source = 'Denture Care Centre'; 
                            $text = 'Denture Care Centre. This notice is to remind you that this appointment is coming soon.'.'This appointment is from '.$startTime.' to '.$endTime; 
                            $content =  'action=sendsms'. 
                                        '&user='.rawurlencode($username). 
                                        '&password='.rawurlencode($password). 
                                        '&to='.rawurlencode($destination). 
                                        '&from='.rawurlencode($source). 
                                        '&text='.rawurlencode($text); 
     
                            $smsglobal_response = file_get_contents('http://www.smsglobal.com.au/http-api.php?'.$content); 
     
                            //Sample Response 
                            //OK: 0; Sent queued message ID: 04b4a8d4a5a02176 SMSGlobalMsgID:6613115713715266  
     
                            $explode_response = explode('SMSGlobalMsgID:', $smsglobal_response); 
     
                            if(count($explode_response) == 2) { //Message Success 
                                 $smsglobal_message_id = $explode_response[1]; 
         
                                 //SMSGlobal Message ID 
                                 echo $smsglobal_message_id; 
                              } else { //Message Failed 
                            echo 'Message Failed.'; 
         
                                 //SMSGlobal Response 
                              echo $smsglobal_response;     
                            } 
            	    }
            	   
            }
    }
}
