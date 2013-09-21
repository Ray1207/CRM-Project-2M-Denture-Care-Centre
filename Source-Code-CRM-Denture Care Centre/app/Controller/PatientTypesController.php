<?php
class PatientTypesController extends AppController {
	public $helpers = array('Html');
        public function index($patient_type_id=null) {
        	$this->layout=false;
             $this->set('patient_type_id',$patient_type_id);
             $this->set('results',$this->PatientType->find('all', array('PatientType.description'=>'ASC')));
         }
         
         
         public function add($patient_type_id=null){
         	 $this->layout=false;
         	if($this->request->is('get'))
   	        {
                     $this->set('patient_type_id',$patient_type_id);
                 }
           
           
         	    if ($this->request->is('post')){    
    	    	    if ($this->PatientType->save($this->request->data)){
    	    	    	    $this->Session->setFlash('New patient type has been saved.','default',array('class'=> 'flash-message-success'));
    	    	    	 $this->redirect(array('controller'=>'patientTypes','action'=>'index', $this->request->data['PatientType']['patient_type_id']));
    	    	    }
    	    	    else {                                                                                                                                         
    	    	    	    $this->Session->setFlash('Unable to save this patient type.','default',array('class'=> 'flash-message-warning')); 
    	    	    }   	    	    
    	    }
         }
         
         
         public function edit($patient_type_id=null){
         	$this->layout = false;
         if($this->request->is('get'))
   	   {
               $this->data=$this->PatientType->read(null,$patient_type_id);
           }
           else{
           	   if ($this->PatientType->save($this->request->data)) 
		   {                                                             
                      $this->Session->setFlash('The patient type details have been updated.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'patientTypes','action'=>'index', $this->request->data['PatientType']['patient_type_id']));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to update the patient type details.','default',array('class'=> 'flash-message-warning')); 
                  }
           }
         }
         
         public function delete($patient_type_id=null){
                
         	 if($this->PatientType->delete($patient_type_id)){
   	       $this->Session->setFlash('Patient type has been deleted.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'patientTypes','action'=>'index', $this->request->data['PatientType']['patient_type_id']));
   	   }
   	   else 
		{
                   $this->Session->setFlash('Unable to delete the patientType.','default',array('class'=> 'flash-message-warning'));
                }
                      

         }
}
?>