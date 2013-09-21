<?php
class JobTitlesController extends AppController {
	public $helpers = array('Html');
        public function index($job_title_id=null) {          	     
             $this->layout=false;
             $this->set('job_title_id',$job_title_id);
             $this->set('results',$this->JobTitle->find('all', array('JobTitle.description'=>'DESC')));
         }
         
         
         public function add($job_title_id=null){
         	 $this->layout=false;
         	 
         	 if ($this->request->is('post')){    	    
    	    	    if ($this->JobTitle->save($this->request->data)){
    	    	    	    $this->Session->setFlash('New job titles has been saved.','default',array('class'=> 'flash-message-success'));
    	    	    	 $this->redirect(array('controller'=>'jobTitles','action'=>'index'));
    	    	    }
    	    	    else {
    	    	    	    $this->Session->setFlash('Unable to save this job title.','default',array('class'=> 'flash-message-warning')); 
    	    	    }   	    	    
    	    }        	    
         }
         
         
         public function edit($job_title_id=null){
         	$this->layout = false;
         if($this->request->is('get'))
   	   {
               $this->data=$this->JobTitle->read(null,$job_title_id);
           }
           else{
           	   if ($this->JobTitle->save($this->request->data)) 
		   {                                                             
                      $this->Session->setFlash('The job title details have been updated.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'jobTitles','action'=>'index', $this->request->data['JobTitle']['job_title_id']));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to update the job title details.','default',array('class'=> 'flash-message-warning')); 
                  }
           }
         }
         
         public function delete($job_title_id=null){
                
         	 if($this->JobTitle->delete($job_title_id)){
   	              $this->Session->setFlash('Job title has been deleted.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'JobTitles','action'=>'index', $clinic));
   	   }
   	   else 
		{
                   $this->Session->setFlash('Unable to delete the job title.','default',array('class'=> 'flash-message-warning'));
                }
                      

         }
}
?>