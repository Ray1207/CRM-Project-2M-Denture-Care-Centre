<?php

class PatientsController extends AppController {
	public $helpers = array('Html', 'Form');
	
            public function index() {          	     
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
        public function status($patient_id=null)
    {
    	    $this->layout = false;
    	   if($this->request->is('get'))
   	   {
               $this->data=$this->Patient->read(null,$patient_id);
           }
           else
           {
           	   if ($this->Patient->save($this->request->data)) 
		   {
                      $this->Session->setFlash('The patient has been updated.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'patients','action'=>'status',$patient_id));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to go to next step.','default',array('class'=> 'flash-message-warning')); 
                  }
           	   
           } 
    }
    
    public function step1(){
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
                    
    	    $s=str_replace("step","",$this->action);
    	    $this->set('patient_id',$this->Session->read('Patient.id'));   	  
              if(!empty($this->data)){
    	    	    if($patient=$this->Patient->save($this->data)){
    	    	    	    $this->Session->write('Step.id', $s);
    	    	    	    $this->redirect(array('action' => 'step'.($s+1)), null, true);
    	    	    } else {
    	    	    	    $this->Session->setFlash('Unable to go to next step.','default',array('class'=> 'flash-message-warning')); 
    	    	    	    
    	    	    }
    	    } else {
    	    	    
			$params = array(
				'conditions' => array('Patient.patient_id' => $this->Session->read('Patient.id'))
			);
			$this->data = $this->Patient->find('first', $params);
    	    }
    	    
    }
    
        public function step2(){
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
              $typeCollection = $this->Patient->PatientType->find('all',array('order'=>'description ASC'));
              $types = array();
              for ($a=0; count($typeCollection)> $a; $a++) {
                  	  $types[$typeCollection[$a]['PatientType']['patient_type_id']]=$typeCollection[$a]['PatientType']['description'];
                  }
              $this->set('patientTypes',$types);
              
    	    $s=str_replace("step","",$this->action);
    	    $this->set('patient_id',$this->Session->read('Patient.id'));
    	    if(!empty($this->data)){
    	    	    if($patient=$this->Patient->save($this->data)){
    	    	    	    $this->Session->write('Step.id', $s);
    	    	    	    $this->Session->setFlash('The patient has been saved.','default',array('class'=> 'flash-message-success'));
                            $this->redirect(array('controller'=>'patients','action'=>'searchPatient'));
    	    	    	
    	    	    } else {
    	    	    	    $this->Session->setFlash('Unable to save this patient.','default',array('class'=> 'flash-message-warning')); 
    	    	    }
    	    } else {
    	    	    $params = array(
				'conditions' => array('Patient.patient_id' => $this->Session->read('Patient.id'))
			);
			$this->data = $this->Patient->find('first', $params);
    	    }
    }
    
        public function searchPatient(){
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

    	    $s=str_replace("step","","step0");
    	    $this->Session->write('Step.id', $s);
    	    $this->Session->write('Patient.id', uniqid());
    	      	    
    	    if ($this->request->is('post')){
    	    	    if($this->data['Patient']['value']==null){
    	    	    	    $this->set('results',$this->Patient->find('all',array('order'=>'surname ASC')));
    	    	    	    
    	    	    }
    	    	    else{
    	    	          switch ($this->data['Patient']['selection']){
    	    	            case '0':
    	    	    	 	 $given_name = $this->data['Patient']['value'];
    	    	    	 	 $this->set('results',$this->Patient->find('all',array('conditions' => array ('Patient.given_name LIKE' => '%'.$given_name.'%'),'order'=>'surname ASC')));
    	    	    	    break; 
    	    	    	 
    	    	    	    case '1':
    	    	    	  	 $surname = $this->data['Patient']['value'];
    	    	    	  	 $this->set('results',$this->Patient->find('all',array('conditions' => array ('Patient.surname LIKE' => '%'.$surname.'%'),'order'=>'surname ASC')));
    	    	    	    break;
    	    	    	    
    	    	    	    case '2':
    	    	    	  	 $patient_type = $this->data['Patient']['value'];
    	    	    	  	  $this->loadModel('PatientType');
    	    	    	  	  $typeColl = $this->PatientType->find('all',array('conditions' => array ('PatientType.description LIKE' => '%'.$patient_type.'%'),'order'=>'description ASC'));
    	    	    	  	  $types = array();
    	    	    	  	  for ($a=0; count($typeColl)> $a; $a++) {
                  	             $types[]=$typeColl[$a]['PatientType']['patient_type_id'];
                                  }
    	    	    	  	 $this->set('results',$this->Patient->find('all',array('conditions' => array ('Patient.patient_type' => $types),'order'=>'surname ASC')));
    	    	    	  	
    	    	    	    break;

    	    	         }
    	    	    } 
    	    
    	    }
    	    else{
    	    	 $this->set('results',$this->Patient->find('all',array('order'=>'surname ASC')));
    	    }
    	      	    
    }
    
    public function view($patient_id=null)
    {
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
                    
    	    $this->set('patient',$this->Patient->read(null,$patient_id));
    }
    public function editStep1($patient_id=null)
    {
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
                    
    	    if($this->request->is('get'))
   	   {
               $this->data=$this->Patient->read(null,$patient_id);
           }
           else
           {
           	   if ($this->Patient->save($this->request->data)) 
		   {
                     /* $this->Session->setFlash('The patient has been updated.','default',array('class'=> 'flash-message-success')); */
                      $this->redirect(array('controller'=>'patients','action'=>'editStep2',$patient_id));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to go to next step.','default',array('class'=> 'flash-message-warning')); 
                  }
           	   
           }                 
    }
    public function editStep2($patient_id=null)
    {
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
                    
              $typeCollection = $this->Patient->PatientType->find('all',array('order'=>'description ASC'));
              $types = array();
              for ($a=0; count($typeCollection)> $a; $a++) {
                  	  $types[$typeCollection[$a]['PatientType']['patient_type_id']]=$typeCollection[$a]['PatientType']['description'];
                  }
              $this->set('patientTypes',$types);
              
    	    if($this->request->is('get'))
   	   {
               $this->data=$this->Patient->read(null,$patient_id);
           }
           else
           {
           	   if ($this->Patient->save($this->request->data)) 
		   {
                      $this->Session->setFlash('The patient has been updated.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'patients','action'=>'searchPatient'));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to update this patient.','default',array('class'=> 'flash-message-warning')); 
                  }
           	   
           }                 
    }
    
    public function delete($staff_id = null)
   {
   	   if($this->Patient->delete($staff_id)){

   	       $this->Session->setFlash('The patient has been deleted.','default',array('class'=> 'flash-message-success'));	       
   	   }
   	   else 
		{
                   $this->Session->setFlash('Unable to delete this patient.','default',array('class'=> 'flash-message-warning'));
                }
                $this->redirect(array('controller'=>'patients','action'=>'searchPatient'));
   }
    
}
?>