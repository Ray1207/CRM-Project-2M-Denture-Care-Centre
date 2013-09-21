<?php
class ReportsController extends AppController {
	public $helpers = array('Html', 'Form');
        public function index() { 
        	date_default_timezone_set('Australia/Victoria');
            	   if($this->Auth->user('job_title')=='4')
            	    {
            	       $this->layout = 'superAdminLayout';
            	       
            	    }
            	    elseif($this->Auth->user('job_title')=='3')
            	    {
            	    	 $this->layout = 'superTechnicianLayout';
            	    }
            	    elseif($this->Auth->user('job_title')=='1')
            	    {
            	    	 $this->layout = 'administratorLayout';
            	    }
                    else
                    {
            	        $this->layout = 'technicianLayout';
                    }
        }
         public function patientChart() { 
        	date_default_timezone_set('Australia/Victoria');
            	   $this->layout=false;   
               
                if(isset($this->request->data['report']['year']['year']) && $this->request->data['report']['year']['year']!=null && $this->request->data['report']['year']['year']!='')
                {
                	$this->set('year',$this->request->data['report']['year']['year']);
                	
                }
                
        }
        public function getBarData()
        {
        	date_default_timezone_set('Australia/Victoria');
            	   //current year
            	   $currentYear = date('Y');
            	   $nextYear = date('Y', strtotime('+1 year', strtotime($currentYear)));
            	  //get para
        	  if(isset($this->request->data['start']) && $this->request->data['start']!=''&& $this->request->data['start']!=null)
        	  {
        	  	  $currentYear = $this->request->data['start'];
        	  	  $nextYear = strval(intval($currentYear)+1);
        	  }
            	   
            	   //2. Get all patient types
                   $this->loadModel('PatientType');
                   $this->loadModel('Patient');
                   $patientTypes=$this->PatientType->find('all');
                  //3. Create the json array
                  $rows = array();
                  
                  for ($a=0; count($patientTypes)> $a; $a++) {
                  	  $patientTypeId=$patientTypes[$a]['PatientType']['patient_type_id'];
                  	  $patientGroups = $this->Patient->query("SELECT COUNT(patient_id),MONTH(created) FROM patients where patient_type=$patientTypeId and created >='$currentYear' and created<'$nextYear' GROUP BY YEAR(created), MONTH(created);");
                  	  $monthData = array(0,0,0,0,0,0,0,0,0,0,0,0);

                  	  foreach($patientGroups as $patientGroup)
                          {              	   
                   	     $month=$patientGroup[0]['MONTH(created)'];
                   	     $monthData[$month-1]= intval($patientGroup[0]['COUNT(patient_id)']);
                          }
                  	  $rows[] = array('name' => $patientTypes[$a]['PatientType']['description'],
                                          'data' => $monthData,
                                          );
                  } 
  
                  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);
        }
        public function getPieData()
        {
        	date_default_timezone_set('Australia/Victoria');
        	//current year
            	   $currentYear = date('Y');
            	   $nextYear = date('Y', strtotime('+1 year', strtotime($currentYear)));
            	               	   
            	   //get para
        	  if(isset($this->request->data['start']) && $this->request->data['start']!=''&& $this->request->data['start']!=null)
        	  {
        	  	  $currentYear = $this->request->data['start'];
        	  	  $nextYear = strval(intval($currentYear)+1);
        	  }
        	         	  
            	   //2. Get all patient types
                   $this->loadModel('PatientType');
                   $this->loadModel('Patient');
                   $patientTypes=$this->PatientType->find('all');
                   //get the number of all patients in this year
                   $overallCollection = $this->Patient->query("SELECT COUNT(patient_id) FROM patients where created >='$currentYear' and created<'$nextYear';");
                   $overall = $overallCollection[0][0]['COUNT(patient_id)'];
                  //3. Create the json array
                  $rows = array();
                  $accu=0;
                  for ($a=0; count($patientTypes)> $a; $a++) {                 	  
                  	  $patientTypeId=$patientTypes[$a]['PatientType']['patient_type_id'];
                  	  //get the number of patients of this type in this year
                  	  $patientGroups = $this->Patient->query("SELECT COUNT(patient_id) FROM patients where patient_type=$patientTypeId and created >='$currentYear' and created<'$nextYear';");
                          if($overall==0)
                          {
                          	  $overall=0.1;
                          }
                  	  $rateShare = round(($patientGroups[0][0]['COUNT(patient_id)']/$overall)*100,2);
                          if($a!=count($patientTypes)-1)
                          {
                          	  $accu=$accu+$rateShare;
                          	  $rows[] = array($patientTypes[$a]['PatientType']['description'], $rateShare);
                          }
                          else
                          {
                  	    $rows[] = array($patientTypes[$a]['PatientType']['description'], 100-$accu);
                  	  }
                  } 
  
                  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);
        }
         public function pieChart() { 
        	date_default_timezone_set('Australia/Victoria');
            	   $this->layout=false; 
            	 if(isset($this->request->data['report']['year']['year']) && $this->request->data['report']['year']['year']!=null && $this->request->data['report']['year']['year']!='')
                {
                	$this->set('year',$this->request->data['report']['year']['year']);
                	
                }
        }
        public function feed() {  
        	date_default_timezone_set('Australia/Victoria');
            	    $this->layout=false;
					
		if ($this->request->is('post')){
			if($this->data['Report']['endDate']==null || $this->data['Report']['endDate']==null)
			{
				$this->loadModel('Patient');
			         $this->set('results',$this->Patient->find('all',array('order'=>'surname ASC')));
			}
			else
			{
		             $endDate = date('Y-m-d', strtotime($this->data['Report']['endDate']));
			     $startDate = date('Y-m-d', strtotime($this->data['Report']['startDate']));
			     $this->loadModel('Patient');

			     $patientCollection = $this->Patient->find('all',array('conditions' => array('Patient.created >=' => $startDate, 'Patient.created <=' => $endDate),'order'=>'surname ASC'));
              	             $this->set('results',$patientCollection);
			}
			 
	       }
	       else{
		        $this->loadModel('Patient');
			$this->set('results',$this->Patient->find('all',array('order'=>'surname ASC')));
	      }
    }

    
    public function view(){
        	 date_default_timezone_set('Australia/Victoria');
                    if($this->Auth->user('job_title')=='4')
            	    {
            	       $this->layout = 'superAdminLayout';
            	       
            	    }
            	    elseif($this->Auth->user('job_title')=='3')
            	    {
            	    	 $this->layout = 'superTechnicianLayout';
            	    }
            	    elseif($this->Auth->user('job_title')=='1')
            	    {
            	    	 $this->layout = 'administratorLayout';
            	    }
                    else
                    {
            	        $this->layout = 'technicianLayout';
                    }	  	     	      	   
									
			if ($this->request->is('post')){
				$this->loadModel('Patient');
				$startDate = $this->data['Patient']['startDate'];
			 	$patientCollection = $this->Patient->find('all',array('conditions' => array ('Patient.created >' => $startDate, 'Patient.created <' => $endDate),'order'=>'surname ASC'));
              	$this->set('results',$patientCollection); 
    	    }
    	    else{
				//$startDate = $this->data['Report.startDate'];
				$startDate = $this->Request->data['Report']['startDate'];
				$endDate= $this->Request->data['Report']['endDate'];
				$this->loadModel('Patient');
				
				$num = $this->Patient->find('count',array('conditions' => array ('Patient.created >' => $startDate, 'Patient.created <' => $endDate),'order'=>'surname ASC'));
				$this->set('number',$num); 
			 	$patientCollection = $this->Patient->find('all',array('conditions' => array ('Patient.created >' => $startDate),'order'=>'surname ASC'));
              	$this->set('results',$patientCollection); 
    	    } 
    }
     public function aptChart() { 
        	date_default_timezone_set('Australia/Victoria');
            	   $this->layout=false;     
            	   if(isset($this->request->data['report']['year']['year']) && $this->request->data['report']['year']['year']!=null && $this->request->data['report']['year']['year']!='')
                {
                	$this->set('year',$this->request->data['report']['year']['year']);
                	
                }
     }
      public function getAptBarData()
        {
        	date_default_timezone_set('Australia/Victoria');
            	   //current year
            	   $currentYear = date('Y');
            	   $nextYear = date('Y', strtotime('+1 year', strtotime($currentYear)));
            	   
            	   if(isset($this->request->data['start']) && $this->request->data['start']!=''&& $this->request->data['start']!=null)
        	  {
        	  	  $currentYear = $this->request->data['start'];
        	  	  $nextYear = strval(intval($currentYear)+1);
        	  }
            	   //2. Get all clinics
                   $this->loadModel('Clinic');
                   $this->loadModel('Appointment');
                   $clinics=$this->Clinic->find('all');
                  //3. Create the json array
                  $rows = array();
                  
                  for ($a=0; count($clinics)> $a; $a++) {
                  	  $clinicId=$clinics[$a]['Clinic']['clinic_id'];
                  	  $aptGroups = $this->Appointment->query("SELECT COUNT(appointment_id),MONTH(startTime) FROM appointments where clinic=$clinicId and startTime >='$currentYear' and startTime<'$nextYear' GROUP BY YEAR(startTime), MONTH(startTime);");
                  	  $monthData = array(0,0,0,0,0,0,0,0,0,0,0,0);

                  	  foreach($aptGroups as $aptGroup)
                          {              	   
                   	     $month=$aptGroup[0]['MONTH(startTime)'];
                   	     $monthData[$month-1]= intval($aptGroup[0]['COUNT(appointment_id)']);
                          }
                  	  $rows[] = array('name' => $clinics[$a]['Clinic']['city'],
                                          'data' => $monthData,
                                          );
                  } 
  
                  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);
        }
        public function aptPie() { 
        	date_default_timezone_set('Australia/Victoria');
            	   $this->layout=false;          
            	   if(isset($this->request->data['report']['year']['year']) && $this->request->data['report']['year']['year']!=null && $this->request->data['report']['year']['year']!='')
                {
                	$this->set('year',$this->request->data['report']['year']['year']);
                	
                }
     }
      public function getAptPieData()
        {
        	date_default_timezone_set('Australia/Victoria');
        	//current year
            	   $currentYear = date('Y');
            	   $nextYear = date('Y', strtotime('+1 year', strtotime($currentYear)));
            	   if(isset($this->request->data['start']) && $this->request->data['start']!=''&& $this->request->data['start']!=null)
        	  {
        	  	  $currentYear = $this->request->data['start'];
        	  	  $nextYear = strval(intval($currentYear)+1);
        	  }
            	   //2. Get all clinics
                   $this->loadModel('Clinic');
                   $this->loadModel('Appointment');
                   $clinics=$this->Clinic->find('all');
                   //get the number of all appointments in this year
                   $overallCollection = $this->Appointment->query("SELECT COUNT(appointment_id) FROM appointments where startTime >='$currentYear' and startTime<'$nextYear';");
                   $overall = $overallCollection[0][0]['COUNT(appointment_id)'];
                   if($overall==0)
                          {
                          	  $overall=0.1;
                          }
                   $rows = array();
                   $accu=0;
                 
                  for ($a=0; count($clinics)> $a; $a++) {                 	  
                  	  $clinicId=$clinics[$a]['Clinic']['clinic_id'];
                  	  //get the number of apointments of this type in this year
                  	  $aptGroups = $this->Appointment->query("SELECT COUNT(appointment_id) FROM appointments where clinic=$clinicId and startTime >='$currentYear' and startTime<'$nextYear';");                         
                  	  $rateShare = round(($aptGroups[0][0]['COUNT(appointment_id)']/$overall)*100,2);
                          if($a!=count($clinics)-1)
                          {
                          	  $accu=$accu+$rateShare;
                          	  $rows[] = array($clinics[$a]['Clinic']['city'], $rateShare);
                          }
                          else
                          {
                  	    $rows[] = array($clinics[$a]['Clinic']['city'], 100-$accu);
                  	  }
                  } 
  
                  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);
        }
        
         public function patientLinechart() { 
        	date_default_timezone_set('Australia/Victoria');
            	   $this->layout=false; 
            	   if(isset($this->request->data['report']['year']['year']) && $this->request->data['report']['year']['year']!=null && $this->request->data['report']['year']['year']!='')
                {
                	$this->set('year',$this->request->data['report']['year']['year']);
                	
                }
        }
        public function aptLinechart() { 
        	date_default_timezone_set('Australia/Victoria');
            	   $this->layout=false; 
            	   if(isset($this->request->data['report']['year']['year']) && $this->request->data['report']['year']['year']!=null && $this->request->data['report']['year']['year']!='')
                {
                	$this->set('year',$this->request->data['report']['year']['year']);
                	
                }
        }
}
?>