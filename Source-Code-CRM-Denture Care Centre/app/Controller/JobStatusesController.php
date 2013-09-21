<?php
class JobStatusesController extends AppController {
	public $helpers = array('Html');
        public function index($patient_id=null) {  
        	date_default_timezone_set('Australia/Victoria');
               $this->layout = false;
               if($this->request->is('get'))
   	          {  	          	  
   	          	    $statusCollection = $this->JobStatus->find('all', array('conditions' => array('JobStatus.patient_id =' => $patient_id)));            
                            $arrStatus = array();
             
                            for ($a=0; count($statusCollection)> $a; $a++) {
                  	  
                  	       $arrStatus[$statusCollection[$a]['JobStatus']['job_status_id']]=$statusCollection[$a]['JobStatus']['patient_status_id'];
                  	  
                            }
                         $this->set('jobStatuses',$arrStatus);
   	          	 $this->set('statuses', $this->JobStatus->PatientStatus->find('all',array('order'=>'sortOrder ASC')));
                         $this->set('results', $statusCollection);
                  }
         }
        public function edit($patient_id=null){
         	  date_default_timezone_set('Australia/Victoria');
         	  $this->layout = false;
                  if($this->request->is('get'))
   	          {
   	          	  
   	          	    $statusCollection = $this->JobStatus->find('all', array('conditions' => array('JobStatus.patient_id =' => $patient_id)));            
                            $arrStatus = array();
             
                            for ($a=0; count($statusCollection)> $a; $a++) {
                  	  
                  	       $arrStatus[$statusCollection[$a]['JobStatus']['job_status_id']]=$statusCollection[$a]['JobStatus']['patient_status_id'];
                  	  
                            }
                         $this->set('jobStatuses',$arrStatus);
   	          	 $this->set('statuses', $this->JobStatus->PatientStatus->find('all',array('order'=>'sortOrder ASC')));
                         $this->set('results', $statusCollection);
                         $this->set('patient', $patient_id);
                  }
                  else{
                  	  //Delete all the records whose patient_id==current patient                  	  
                  	  $this->JobStatus->deleteAll(array('JobStatus.patient_id' => $_POST['id']), false);
                  	   //insert all checked status
                  	   if(isset($_POST['statusList']) && is_array($_POST['statusList']) )
                     	   {
                     	   	   $insertFlag=1;
                     	            foreach($_POST['statusList'] as $checkedStatus)
                     	           {
                     	           	   $data = array('job_status_id'=>'','patient_id' => $_POST['id'], 'patient_status_id' => $checkedStatus);
                                           if($this->JobStatus->save($data))
                                           {
                                           }
                                           else
                                           {
                                           	   $insertFlag=0;
                                           }
                     	           }
                     	           if($insertFlag==0)
                     	           {
                     	     	      $this->Session->setFlash('Unable to update Deture job progress.','default',array('class'=> 'flash-message-warning')); 
                     	     	      $this->redirect(array('controller'=>'JobStatuses','action'=>'edit', $_POST['id']));
                     	           }
                     	           else
                     	           {
                     	              $this->Session->setFlash('Deture job progress has been updated.','default',array('class'=> 'flash-message-success'));
                     	              $this->redirect(array('controller'=>'JobStatuses','action'=>'edit', $_POST['id']));
                     	           }
                     	    }
                 }
         }
}
?>