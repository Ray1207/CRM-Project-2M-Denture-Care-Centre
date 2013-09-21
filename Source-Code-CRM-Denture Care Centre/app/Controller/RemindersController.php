<?php
class RemindersController extends AppController {
	public $helpers = array('Html');
        public function index($reminderTime=null) {          	     
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
             $this->set('reminderTime',$reminderTime);           
             $time=date('Y-m-d', strtotime($reminderTime));
             $this->set('results',$this->Reminder->find('all',array('conditions' => array ('Reminder.reminder_time'=>$time,'Reminder.staff_id'=>$this->Auth->user('staff_id')),'order'=>array('Reminder.description'=>'ASC'))));
         }
         
         
         public function add($reminderTime=null){
         	 $this->layout=false;
         	 $this->set('reminderTime',$reminderTime);
         	    if ($this->request->is('post')){    
         	    	    $time=$this->request->data['Reminder']['reminder_time'];
         	    	    $this->request->data['Reminder']['reminder_time']=date('Y-m-d', strtotime($time));
    	    	    if ($this->Reminder->save($this->request->data)){
    	    	    	    $this->Session->setFlash('New reminder has been saved.','default',array('class'=> 'flash-message-success'));
    	    	    	 $this->redirect(array('controller'=>'reminders','action'=>'index',$time));
    	    	    }
    	    	    else {                                                                                                                                         
    	    	    	    $this->Session->setFlash('Unable to save reminder.','default',array('class'=> 'flash-message-warning')); 
    	    	    }   	    	    
    	    }
         }
         
         
         public function edit($reminder_id=null){
         	$this->layout = false;
         if($this->request->is('get'))
   	   {
               $this->data=$this->Reminder->read(null,$reminder_id);
           }
           else{
           	 /*  $this->request->data['ClinicalNote']['modified_time']=date('m/d/Y h:i:s a', time()); */
           	   if ($this->Reminder->save($this->request->data)) 
		   {                                                             
                      $this->Session->setFlash('Reminder has been updated.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'reminders','action'=>'index', $this->request->data['Reminder']['reminder_time']));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to update reminder.','default',array('class'=> 'flash-message-warning')); 
                  }
           }
         }
         
         public function delete($reminder_id=null,$reminder_time=null){
         	 if($this->Reminder->delete($reminder_id)){
   	       $this->Session->setFlash('Reminder has been deleted.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'reminders','action'=>'index', $reminder_time));
   	   }
   	   else 
		{
                   $this->Session->setFlash('Unable to delete the reminder.','default',array('class'=> 'flash-message-warning'));
                }
         }
}
?>