<?php
class AppointmentsController extends AppController {
	public $helpers = array('Html');
        public function index($patient_id=null) {          	     
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
                   
             $technicianCollection = $this->Appointment->User->find('all',array('conditions' => array ('User.job_title' =>array('Technician', 'Super Technician')),'order'=>'given_name ASC'));            
             $arrTechnicians = array();
             
                  for ($a=0; count($technicianCollection)> $a; $a++) {
                  	  
                  	  $arrTechnicians[$technicianCollection[$a]['User']['staff_id']]=$technicianCollection[$a]['User']['given_name']. " " .$technicianCollection[$a]['User']['surname'];
                  	  
                  }
              $this->set('technicians',$arrTechnicians);              
              $patientCollection = $this->Appointment->Patient->find('all',array('order'=>'given_name ASC'));
              $arrPatients = array();
                  for ($a=0; count($patientCollection)> $a; $a++) {
                  	  $arrPatients[$patientCollection[$a]['Patient']['patient_id']]=$patientCollection[$a]['Patient']['given_name']. " " .$patientCollection[$a]['Patient']['surname'];
                  }
              $this->set('patients',$arrPatients);
              
              $clinicCollection = $this->Appointment->Clinic->find('all',array('order'=>'city ASC'));
              $arrClinics = array();
              for ($a=0; count($clinicCollection)> $a; $a++) {
                  	  $arrClinics[$clinicCollection[$a]['Clinic']['clinic_id']]=$clinicCollection[$a]['Clinic']['city'];
                  }
              $this->set('clinics',$arrClinics);
         }
   public function feed() {
   	   date_default_timezone_set('Australia/Victoria');
   	   
                 //1. Transform request parameters to MySQL datetime format.
                  $mysqlstart = date('Y-m-d H:i:s', substr($this->params['url']['start'],0,10));
                  $mysqlend = date('Y-m-d H:i:s', substr($this->params['url']['end'],0,10));
                  $clinic = $this->params['url']['clinic'];
                   //2. Get the events corresponding to the time range and the clinic
                  $conditions = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.clinic'=>$clinic);
                  $appointments = $this->Appointment->find('all',array('conditions' =>$conditions));
                  //3. Create the json array
                  $rows = array();
                  
                  for ($a=0; count($appointments)> $a; $a++) {
                  	
                  	  $rows[] = array('id' => $appointments[$a]['Appointment']['appointment_id'],
                                          'title' => $appointments[$a]['Appointment']['title'],
                                          'start' => date('Y-m-d H:i', strtotime($appointments[$a]['Appointment']['startTime'])),
                                          'end' => date('Y-m-d H:i',strtotime($appointments[$a]['Appointment']['endTime'])),
                                          'body' => $appointments[$a]['Appointment']['additionalInfo'],
                                          'staff_id' => $appointments[$a]['Appointment']['staff_id'],
                                          'patient_id' => $appointments[$a]['Appointment']['patient_id'],
                                          'techName'=>$appointments[$a]['User']['given_name'].' '.$appointments[$a]['User']['surname'],
                                          'patientName'=>$appointments[$a]['Patient']['given_name'].' '.$appointments[$a]['Patient']['surname'],
                                          );
                  }   
                  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);
                  
                  /*
                  print_r ($appointments);
                  */
}
         public function addAppointment()
         {
         	 date_default_timezone_set('Australia/Victoria');
        	 if ($this->request->is('post')){    
         	 	$title=$this->request->data['title'];
         	 	$start=$this->request->data['start'];
         	 	$newStart=substr($start,0,24);
         	 	$end=$this->request->data['end'];
         	 	$newEnd=substr($end,0,24);
         	 	$body=$this->request->data['body'];
         	 	$patient=$this->request->data['patient_id'];
         	 	$techinican=$this->request->data['staff_id'];
         	 	$clinic=$this->request->data['clinic'];
         	 	
         	 	$this->request->data['Appointment']['clinic']=$clinic;   
         	    	$this->request->data['Appointment']['title']=$title;        	    	
         	    	$this->request->data['Appointment']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
         	    	$this->request->data['Appointment']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));       	    	
         	    	$this->request->data['Appointment']['additionalInfo']=$body;
         	    	$this->request->data['Appointment']['patient_id']=$patient;
         	    	$this->request->data['Appointment']['staff_id']=$techinican;
         	    	$this->request->data['Appointment']['lastModifiedBy']=$this->Auth->user('staff_id');
         	    	
         	    	//validation1:  clinic same, time same, technician same, patient same
         	    	$mysqlstart=date('Y-m-d H:i:s' , strtotime($newStart));
         	    	$mysqlend=date('Y-m-d H:i:s' , strtotime($newEnd));
         	    	$validation1 = 1;
         	    	$conditions1 = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.clinic'=>$clinic,'Appointment.patient_id'=>$patient,'Appointment.staff_id'=>$techinican);
                        $appointments1 = $this->Appointment->find('all',array('conditions' =>$conditions1));
                        if(count($appointments1)!=0)
                        {
                        	$validation1 = 0;
                        }
                        //validation2: time same, technician same
                        $validation2 = 1;
         	    	$conditions2 = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.staff_id'=>$techinican);
                        $appointments2 = $this->Appointment->find('all',array('conditions' =>$conditions2));
                        if(count($appointments2)!=0)
                        {
                        	$validation2 = 0;
                        }
                        //validation3: time same, patient same
                        $validation3 = 1;
         	    	$conditions3 = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.patient_id'=>$patient);
                        $appointments3 = $this->Appointment->find('all',array('conditions' =>$conditions3));
                        if(count($appointments3)!=0)
                        {
                        	$validation3 = 0;
                        }
                        //save
                        $rows = array();
                        if($validation1==0 ||$validation2==0 ||$validation2==0)
                        {
                        	$rows[]=array(0);
                        }
                        else
                        {
                        	$rows[]=array(1);
                        	if ($this->Appointment->save($this->request->data)){}
    	    	                else{$rows[0]=array(3);}
                        }
         	           	    	     	    	    
    	    	  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows); 
    	    }
         }
         public function editAppointment(){
         	 date_default_timezone_set('Australia/Victoria');
               if($this->request->is('post'))
   	       {
   	       	        $appt_id=$this->request->data['id'];
   	       	        if($appt_id==null)return;
                        $title=$this->request->data['title'];
         	 	$start=$this->request->data['start'];
         	 	$newStart=substr($start,0,24);
         	 	$end=$this->request->data['end'];
         	 	$newEnd=substr($end,0,24);
         	 	$body=$this->request->data['body'];
         	 	$patient=$this->request->data['patient_id'];
         	 	$techinican=$this->request->data['staff_id'];
         	 	$clinic=$this->request->data['clinic'];
         	 	
         	 	$this->request->data['Appointment']['appointment_id']=$appt_id;
         	    	$this->request->data['Appointment']['title']=$title;        	    	
         	    	$this->request->data['Appointment']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
         	    	$this->request->data['Appointment']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));       	    	
         	    	$this->request->data['Appointment']['additionalInfo']=$body;
         	    	$this->request->data['Appointment']['patient_id']=$patient;
         	    	$this->request->data['Appointment']['staff_id']=$techinican;
         	    	$this->request->data['Appointment']['lastModifiedBy']=$this->Auth->user('staff_id');
         	    	
         	    	//validation1:  clinic same, time same, technician same, patient same, except the original appointment
         	    	$mysqlstart=date('Y-m-d H:i:s' , strtotime($newStart));
         	    	$mysqlend=date('Y-m-d H:i:s' , strtotime($newEnd));
         	    	$validation1 = 1;
         	    	$conditions1 = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.appointment_id !='=>$appt_id,'Appointment.clinic'=>$clinic,'Appointment.patient_id'=>$patient,'Appointment.staff_id'=>$techinican);
                        $appointments1 = $this->Appointment->find('all',array('conditions' =>$conditions1));
                        if(count($appointments1)!=0)
                        {
                        	$validation1 = 0;
                        }
                        //validation2: time same, technician same, except the original appointment
                        $validation2 = 1;
         	    	$conditions2 = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.staff_id'=>$techinican,'Appointment.appointment_id !='=>$appt_id);
                        $appointments2 = $this->Appointment->find('all',array('conditions' =>$conditions2));
                        if(count($appointments2)!=0)
                        {
                        	$validation2 = 0;
                        }
                        //validation3: time same, patient same, but not the original appointment
                        $validation3 = 1;
         	    	$conditions3 = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.patient_id'=>$patient,'Appointment.appointment_id !='=>$appt_id);
                        $appointments3 = $this->Appointment->find('all',array('conditions' =>$conditions3));
                        if(count($appointments3)!=0)
                        {
                        	$validation3 = 0;
                        }
                        //save
                        $rows = array();
                        if($validation1==0 ||$validation2==0 ||$validation2==0)
                        {
                        	$rows[]=array(0);
                        }
                        else
                        {
                        	$rows[]=array(1);
                        	if ($this->Appointment->save($this->request->data)){}
    	    	                else{$rows[0]=array(3);}
                        }
         	            	    	  	    	     	    	    
    	    	  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);    
               }
        }
        public function dropResizeSaving()
        {
        	date_default_timezone_set('Australia/Victoria');
        	if($this->request->is('post'))
   	       {
   	       	        $appt_id=$this->request->data['id'];
   	       	        if($appt_id==null)return;
         	 	$start=$this->request->data['start'];
         	 	$newStart=substr($start,0,24);
         	 	$end=$this->request->data['end'];
         	 	$newEnd=substr($end,0,24);
         	 	
         	 	$this->request->data['Appointment']['appointment_id']=$appt_id;	    	
         	    	$this->request->data['Appointment']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
         	    	$this->request->data['Appointment']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd)); 
         	    	$this->request->data['Appointment']['lastModifiedBy']=$this->Auth->user('staff_id');
         	    	
         	    	$originalApt=$this->Appointment->find('all',array('conditions' =>array('Appointment.appointment_id '=>$appt_id)));
         	    	$clinic = $originalApt[0]['Appointment']['clinic'];
         	    	$patient = $originalApt[0]['Appointment']['patient_id'];
         	    	$techinican = $originalApt[0]['Appointment']['staff_id'];
         	    	
         	    	//validation1:  clinic same, time same, technician same, patient same, except the original appointment
         	    	$mysqlstart=date('Y-m-d H:i:s' , strtotime($newStart));
         	    	$mysqlend=date('Y-m-d H:i:s' , strtotime($newEnd));
         	    	$validation1 = 1;
         	    	$conditions1 = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.appointment_id !='=>$appt_id,'Appointment.clinic'=>$clinic,'Appointment.patient_id'=>$patient,'Appointment.staff_id'=>$techinican);
                        $appointments1 = $this->Appointment->find('all',array('conditions' =>$conditions1));
                        if(count($appointments1)!=0)
                        {
                        	$validation1 = 0;
                        }
                        //validation2: time same, technician same, except the original appointment
                        $validation2 = 1;
         	    	$conditions2 = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.staff_id'=>$techinican,'Appointment.appointment_id !='=>$appt_id);
                        $appointments2 = $this->Appointment->find('all',array('conditions' =>$conditions2));
                        if(count($appointments2)!=0)
                        {
                        	$validation2 = 0;
                        }
                        //validation3: time same, patient same, but not the original appointment
                        $validation3 = 1;
         	    	$conditions3 = array('Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),'Appointment.patient_id'=>$patient,'Appointment.appointment_id !='=>$appt_id);
                        $appointments3 = $this->Appointment->find('all',array('conditions' =>$conditions3));
                        if(count($appointments3)!=0)
                        {
                        	$validation3 = 0;
                        }
                        //save
                        $rows = array();
                        if($validation1==0 ||$validation2==0 ||$validation2==0)
                        {
                        	$rows[]=array(0);
                        }
                        else
                        {
                        	$rows[]=array(1);        
                        	//availability validation
                        	$this->loadModel('Availability');
                        	$conditions4 = array( "and" => array("Availability.startTime <="=>$mysqlstart,"Availability.endTime >="=>$mysqlend,"Availability.belongsTo "=>$techinican));
                                $avl = $this->Availability->find('count',array('conditions' =>$conditions4));
                                if($avl==0)
                                {
                                    $rows[0]=array(2);
                                }
                                else
                                {
                        	   if ($this->Appointment->save($this->request->data)){}
    	    	                   else{$rows[0]=array(3);}
    	    	                }
                        }
   	    	     	    	    
    	    	  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);    
               }
        }
        public function deleteAppointment(){
              $appt_id=$this->request->data['id'];  
              $rows = array();
              if($this->Appointment->delete($appt_id)){
              	      $rows[]=array(1);
   	      }
   	      else 
		{
			$rows[]=array(0);
                }
                 Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows); 
        }   
        public function timeTable()
       {
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
             $technicianCollection = $this->Appointment->User->find('all',array('conditions' => array ('User.job_title' =>array('Technician', 'Super Technician')),'order'=>'given_name ASC'));            
             $arrTechnicians = array();
             
                  for ($a=0; count($technicianCollection)> $a; $a++) {
                  	  
                  	  $arrTechnicians[$technicianCollection[$a]['User']['staff_id']]=$technicianCollection[$a]['User']['given_name']. " " .$technicianCollection[$a]['User']['surname'];
                  	  
                  }
              $this->set('technicians',$arrTechnicians);
              
              $patientCollection = $this->Appointment->Patient->find('all',array('order'=>'given_name ASC'));
              $arrPatients = array();
                  for ($a=0; count($patientCollection)> $a; $a++) {
                  	  $arrPatients[$patientCollection[$a]['Patient']['patient_id']]=$patientCollection[$a]['Patient']['given_name']. " " .$patientCollection[$a]['Patient']['surname'];
                  }
              $this->set('patients',$arrPatients);
              
              $clinicCollection = $this->Appointment->Clinic->find('all',array('order'=>'city ASC'));
              $arrClinics = array();
              for ($a=0; count($clinicCollection)> $a; $a++) {
                  	  $arrClinics[$clinicCollection[$a]['Clinic']['clinic_id']]=$clinicCollection[$a]['Clinic']['city'];
                  }
              $this->set('clinics',$arrClinics);
       }
          public function feedTimeTable() {
          	  
   	         date_default_timezone_set('Australia/Victoria');
   	   
                 //1. Transform request parameters to MySQL datetime format.
                  $mysqlstart = date('Y-m-d H:i:s', substr($this->params['url']['start'],0,10));
                  $mysqlend = date('Y-m-d H:i:s', substr($this->params['url']['end'],0,10));
                  $userId=$this->Auth->user('staff_id');
                  $clinic = $this->params['url']['clinic'];
                   //2. Get the events corresponding to the time range
                  $conditions = array('AND'=>array(
                  'Appointment.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),
                  'Appointment.staff_id'=>$userId,'Appointment.clinic'=>$clinic
                  ));
                  $appointments = $this->Appointment->find('all',array('conditions' =>$conditions));
                  //3. Create the json array
                  $rows = array();
                  
                  for ($a=0; count($appointments)> $a; $a++) {
                  	  $rows[] = array('id' => $appointments[$a]['Appointment']['appointment_id'],
                                          'title' => $appointments[$a]['Appointment']['title'],
                                          'start' => date('Y-m-d H:i', strtotime($appointments[$a]['Appointment']['startTime'])),
                                          'end' => date('Y-m-d H:i',strtotime($appointments[$a]['Appointment']['endTime'])),
                                          'body' => $appointments[$a]['Appointment']['additionalInfo'],
                                          'staff_id' => $appointments[$a]['Appointment']['staff_id'],
                                          'patient_id' => $appointments[$a]['Appointment']['patient_id'],
                                          'patientName'=>$appointments[$a]['Patient']['given_name'].' '.$appointments[$a]['Patient']['surname'],
                                          );
                  }   
                  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);
         }
          public function dailyApt()
          {
              date_default_timezone_set('Australia/Victoria');
              $this->layout=false;
              $clinicCollection = $this->Appointment->Clinic->find('all',array('order'=>'city ASC'));
              $arrClinics = array('0'=>'All');
              for ($a=0; count($clinicCollection)> $a; $a++) {
                  	  $arrClinics[$clinicCollection[$a]['Clinic']['clinic_id']]=$clinicCollection[$a]['Clinic']['city'];
              }
              $this->set('clinics',$arrClinics);
              
          	  if ($this->request->is('post')){          	  	  
			$queryDate = date('Y-m-d',time());
			if($this->data['Appointment']['queryDate']!="" && $this->data['Appointment']['queryDate']!=null)
			{
				$queryDate = date('Y-m-d', strtotime($this->data['Appointment']['queryDate']));
			}
			$clinic = $this->data['Appointment']['clinic'];
			if($clinic==0)
			{
				$conditions = array(
                                   'Appointment.startTime BETWEEN ? AND ?' => array(date('Y-m-d 00:00:00',strtotime($queryDate)),date('Y-m-d 23:59:59',strtotime($queryDate)))
                         );
			}
			else
			{
			   $conditions = array('AND'=>array(
                                  'Appointment.startTime BETWEEN ? AND ?' => array(date('Y-m-d 00:00:00',strtotime($queryDate)),date('Y-m-d 23:59:59',strtotime($queryDate))),
                                  'Appointment.clinic'=>$clinic
                           ));
                        }
			$this->set('results',$this->Appointment->find('all',array('conditions' =>$conditions)));
		 }
		 else{
		 
		 	 $conditions = array(
                                   'Appointment.startTime BETWEEN ? AND ?' => array(date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time()))
                         );
			$this->set('results',$this->Appointment->find('all',array('conditions' =>$conditions)));
		}
          }
}
?>