<?php
class PatientStatusesController extends AppController {
	public $helpers = array('Html');
        public function index($status_id=null) {          	     
             $this->layout=false;
             $this->set('statusId',$status_id);
             $this->set('results',$this->PatientStatus->find('all', array('order'=>'sortOrder ASC')));
         }
         
         
         public function add($status_id=null){
         	 $this->layout=false;
                     $this->set('status_id',$status_id);        
                     
         	    if ($this->request->is('post')){    
         	    	    
    	    	    if ($this->PatientStatus->save($this->request->data)){
    	    	    	    $this->Session->setFlash('New patient status has been saved.','default',array('class'=> 'flash-message-success'));
    	    	    	    $this->redirect(array('controller'=>'patientStatuses','action'=>'index'));
    	    	    }
    	    	    else {                                                                                                                                         
    	    	    	    $this->Session->setFlash('Unable to save this status.','default',array('class'=> 'flash-message-warning')); 
    	    	    }   	    	    
    	    }
    	    
         }
         
         
         public function edit($status_id=null){
         	$this->layout = false;
         if($this->request->is('get'))
   	   {
               $this->data=$this->PatientStatus->read(null,$status_id);
           }
           else{
           	   if ($this->PatientStatus->save($this->request->data)) 
		   {                                                             
                      $this->Session->setFlash('The status details have been updated.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'patientStatuses','action'=>'index', $this->request->data['PatientStatus']['status_id']));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to update the status details.','default',array('class'=> 'flash-message-warning')); 
                  }
           }
         }
         
         public function delete($status_id=null){
                
         	 if($this->PatientStatus->delete($status_id)){
   	       $this->Session->setFlash('Patient Status has been deleted.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'PatientStatuses','action'=>'index', $clinic));
   	   }
   	   else 
		{
                   $this->Session->setFlash('Unable to delete the status.','default',array('class'=> 'flash-message-warning'));
                }
                      

         }
}
?>