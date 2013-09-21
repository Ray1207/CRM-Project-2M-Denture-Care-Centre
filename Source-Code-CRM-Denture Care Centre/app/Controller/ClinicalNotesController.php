<?php
class ClinicalNotesController extends AppController {
	public $helpers = array('Html');
        public function index($patient_id=null) {  
        	date_default_timezone_set('Australia/Victoria');
             $this->layout=false;
             $this->set('patientId',$patient_id);
             $this->set('patient_name', $this->ClinicalNote->Patient->find('all',array('conditions'=>array('Patient.patient_id'=>$patient_id),'fields'=>array('Patient.given_name','Patient.surname'))));
             $this->set('results',$this->ClinicalNote->find('all',array('conditions' => array ('ClinicalNote.patient_id'=>$patient_id ),'order'=>array('ClinicalNote.created'=>'DESC'))));
         }
         public function noteslist($patient_id=null)
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
                     $this->set('patientId',$patient_id);
         } 
         
         public function add($patient_id=null){
         	  date_default_timezone_set('Australia/Victoria');
         	 $this->layout=false;
         	if($this->request->is('get'))
   	        {
                     $this->set('patient_id',$patient_id);
                 }
           
           
         	    if ($this->request->is('post')){    
         	    	/*  $this->request->data['ClinicalNote']['created_time']=date('m/d/Y h:i:s a', time()); 
         	    	  $this->request->data['ClinicalNote']['modified_time']=date('m/d/Y h:i:s a', time()); */
    	    	    if ($this->ClinicalNote->save($this->request->data)){
    	    	    	    $this->Session->setFlash('Clinical notes have been saved.','default',array('class'=> 'flash-message-success'));
    	    	    	 $this->redirect(array('controller'=>'clinical_notes','action'=>'index', $this->request->data['ClinicalNote']['patient_id']));
    	    	    }
    	    	    else {                                                                                                                                         
    	    	    	    $this->Session->setFlash('Unable to save this clinical notes.','default',array('class'=> 'flash-message-warning')); 
    	    	    }   	    	    
    	    }
         }
         
         
         public function edit($note_id=null){
         	  date_default_timezone_set('Australia/Victoria');
         	$this->layout = false;
         if($this->request->is('get'))
   	   {
               $this->data=$this->ClinicalNote->read(null,$note_id);
           }
           else{
           	 /*  $this->request->data['ClinicalNote']['modified_time']=date('m/d/Y h:i:s a', time()); */
           	   if ($this->ClinicalNote->save($this->request->data)) 
		   {                                                             
                      $this->Session->setFlash('The clinical notes have been updated.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'clinical_notes','action'=>'index', $this->request->data['ClinicalNote']['patient_id']));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to update the clinical notes.','default',array('class'=> 'flash-message-warning')); 
                  }
           }
         }
         
         public function delete($note_id=null,$patient=null){
         	 
              /*  $this->set('patient',$this->ClinicalNote->find('all',array('conditions' => array ('ClinicalNote.clinical_notes_id'=>$note_id)))); */
                
         	 if($this->ClinicalNote->delete($note_id)){
   	       $this->Session->setFlash('Clinical notes have been deleted.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'clinical_notes','action'=>'index', $patient));
   	   }
   	   else 
		{
                   $this->Session->setFlash('Unable to delete the clinical notes.','default',array('class'=> 'flash-message-warning'));
                }
                      

         }
}
?>