<?php
class ClinicsController extends AppController {
	public $helpers = array('Html');
        public function index($clinic_id=null) {          	     
            $this->layout=false;
             $this->set('clinic_id',$clinic_id);
             $this->set('results',$this->Clinic->find('all', array('Clinic.city'=>'DESC')));
         }
         
         
         public function add($clinic_id=null){
         	 $this->layout=false;
         	if($this->request->is('get'))
   	        {
                     $this->set('clinic_id',$clinic_id);
                 }
           
           
         	    if ($this->request->is('post')){    
    	    	    if ($this->Clinic->save($this->request->data)){
    	    	    	    $this->Session->setFlash('New clinic has been saved.','default',array('class'=> 'flash-message-success'));
    	    	    	 $this->redirect(array('controller'=>'clinics','action'=>'index'));
    	    	    }
    	    	    else {                                                                                                                                         
    	    	    	    $this->Session->setFlash('Unable to save this clinic.','default',array('class'=> 'flash-message-warning')); 
    	    	    }   	    	    
    	    }
         }
         
         
         public function edit($clinic_id=null){
         	$this->layout = false;
         if($this->request->is('get'))
   	   {
               $this->data=$this->Clinic->read(null,$clinic_id);
           }
           else{
           	 /*  $this->request->data['ClinicalNote']['modified_time']=date('m/d/Y h:i:s a', time()); */
           	   if ($this->Clinic->save($this->request->data)) 
		   {                                                             
                      $this->Session->setFlash('The clinic details have been updated.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'clinics','action'=>'index', $this->request->data['Clinic']['clinic_id']));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to update the clinic details.','default',array('class'=> 'flash-message-warning')); 
                  }
           }
         }
         
         public function delete($clinic_id=null){
         	 
              /*  $this->set('patient',$this->ClinicalNote->find('all',array('conditions' => array ('ClinicalNote.clinical_notes_id'=>$note_id)))); */
                
         	 if($this->Clinic->delete($clinic_id)){
   	       $this->Session->setFlash('Clinic has been deleted.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'clinics','action'=>'index', $clinic));
   	   }
   	   else 
		{
                   $this->Session->setFlash('Unable to delete the clinic.','default',array('class'=> 'flash-message-warning'));
                }
                      

         }
}
?>