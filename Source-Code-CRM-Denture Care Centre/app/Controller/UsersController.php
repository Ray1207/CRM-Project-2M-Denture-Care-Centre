<?php
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController {
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
                    $technicianId=$this->Auth->user('staff_id');
                    $currentTime = date('Y-m-d h:i:s');
                    $currentDate =   date('Y-m-d');
                    $this->set('results',$this->User->Appointment->find('all',array('conditions' => array ('Appointment.staff_id'=>$technicianId,'Appointment.startTime >=?' =>$currentDate),'order'=>array('Appointment.startTime'=>'ASC'))));
                   // $this->set('results',$this->User->Appointment->find('all'));
                    $this->set('reminders',$this->User->Reminder->find('all',array('conditions' => array ('Reminder.staff_id'=>$technicianId,'Reminder.reminder_time >=?' =>$currentDate),'order'=>array('Reminder.reminder_time'=>'ASC'))));
    }
    public function login() {  	   
    	    $this->layout = 'loginLayout';   	   
    	    if($this->request->is('post')){
    	    	    if( $this->Auth->login()) {
    	    	    	    $this->redirect($this->Auth->redirect());
    	    	    }
    	    	    else{
    	    	    	    $this->Session->setFlash('Your username or password was incorrect.<br> Or you have been suspended.');
    	    	    }
    	    }
    }
    
    public function logout() {   	  
    	    $this->redirect($this->Auth->logout());
    }
    
    public function addAdmin() {
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
               $jobCollection = $this->User->JobTitle->find('all',array('order'=>'description ASC'));
              $jobs = array();
              for ($a=0; count($jobCollection)> $a; $a++) {
                  	  $jobs[$jobCollection[$a]['JobTitle']['job_title_id']]=$jobCollection[$a]['JobTitle']['description'];
                  }
              $this->set('jobTitles',$jobs);     
    	    if ($this->request->is('post')){
    	    	    $this->request->data['User']['username']= $this->request->data['User']['email_address'];
    	    	    $this->request->data['User']['password']= '000111222' ;
    	    	    //$this->request->data['User']['avatar_photo']= '/img/Upload/Default.png';     	    
    	    	    if ($this->User->save($this->request->data)){
    	    	    	    $this->Session->setFlash('The staff has been saved.','default',array('class'=> 'flash-message-success'));
    	    	    	 $this->redirect(array('controller'=>'users','action'=>'searchAdmin'));
    	    	    }
    	    	    else {
    	    	    	    $this->Session->setFlash('Unable to save this staff.','default',array('class'=> 'flash-message-warning')); 
    	    	    }   	    	    
    	    }
    }
    
    public function searchAdmin(){
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
    	    	    if($this->data['User']['value']==null){
    	    	    	    $this->set('results',$this->User->find('all',array('order'=>'surname ASC')));
    	    	    }
    	    	    else{
    	    	          switch ($this->data['User']['selection']){
    	    	            case '0':
    	    	         	 $job_title = $this->data['User']['value'];
    	    	         	  $this->loadModel('JobTitle');
    	    	    	  	  $titlesColl = $this->JobTitle->find('all',array('conditions' => array ('JobTitle.description LIKE' => '%'.$job_title.'%'),'order'=>'description ASC'));
    	    	    	  	  $titles = array();
    	    	    	  	  for ($a=0; count($titlesColl)> $a; $a++) {
                  	             $titles[]=$titlesColl[$a]['JobTitle']['job_title_id'];
                                  }
    	    	         	 $this->set('results',$this->User->find('all',array('conditions' => array ('User.job_title' => $titles),'order'=>'surname ASC')));
    	    	    	    break; 
    	    	    	 
    	    	    	    case '1':
    	    	    	 	 $given_name = $this->data['User']['value'];
    	    	    	 	 $this->set('results',$this->User->find('all',array('conditions' => array ('User.given_name LIKE' => '%'.$given_name.'%'),'order'=>'surname ASC')));
    	    	    	    break;
    	    	    	 
    	    	    	    case '2':
    	    	    	  	 $surname = $this->data['User']['value'];
    	    	    	  	 $this->set('results',$this->User->find('all',array('conditions' => array ('User.surname LIKE' => '%'.$surname.'%'),'order'=>'surname ASC')));
    	    	    	    break;
    	    	    }
    	    	    }     	    
    	    }
    	    else{
    	    	 $this->set('results',$this->User->find('all',array('order'=>'surname ASC')));
    	    }
    }
   
   public function editAdmin($staff_id = null) 
   {   date_default_timezone_set('Australia/Victoria');
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
             $jobCollection = $this->User->JobTitle->find('all',array('order'=>'description ASC'));
              $jobs = array();
              for ($a=0; count($jobCollection)> $a; $a++) {
                  	  $jobs[$jobCollection[$a]['JobTitle']['job_title_id']]=$jobCollection[$a]['JobTitle']['description'];
                  }
              $this->set('jobTitles',$jobs);
   	   if($this->request->is('get'))
   	   {
               $this->data=$this->User->read(null,$staff_id);
               
           }
           else{
           	   $this->request->data['User']['email_confirmation']= $this->request->data['User']['email_address'];
           	   if ($this->User->save($this->request->data)) 
		   {
                      $this->Session->setFlash('The staff has been updated.','default',array('class'=> 'flash-message-success'));
                      $this->redirect(array('controller'=>'users','action'=>'searchAdmin'));
                   } 
		  else 
		  {
                    $this->Session->setFlash('Unable to update this staff.','default',array('class'=> 'flash-message-warning')); 
                  }
           }
   } 
   
   public function view($staff_id = null)
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
                    
    	    $this->set('staff',$this->User->read(null,$staff_id));
   }
   
   public function delete($staff_id = null)
   {
   	   $Imageconditions = array("User.staff_id" => $staff_id); 
                   $Imageresults = $this->User->find('first', array('conditions' => $Imageconditions)); 
                   $currentImage = $Imageresults['User']['avatar_photo'];
                   $path = substr(WWW_ROOT,0,strlen($str)-1).$currentImage;
   	   if($this->User->delete($staff_id)){
   	   	   
                   if(($currentImage != null) && ($currentImage !='/img/Upload/Default.png')) 
                   {
                      
                      unlink($path); 
                   } 
   	       $this->Session->setFlash('The staff has been deleted.','default',array('class'=> 'flash-message-success'));	       
   	   }
   	   else 
		{
                   $this->Session->setFlash('Unable to delete this staff.','default',array('class'=> 'flash-message-warning'));
                }
                $this->redirect(array('controller'=>'users','action'=>'searchAdmin'));
   }
   	
	public function searchTechnician()
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
		
		
    	    if ($this->request->is('post')){
    	    	    if($this->data['User']['value']==null){
    	    	    	    $this->set('results',$this->User->find('all',array('conditions' => array ('User.job_title =' => 'Technician'),'order'=>'surname ASC')));
    	    	    }
    	    	    else{
    	    	          switch ($this->data['User']['selection']){
    	    	            case '0':
    	    	         	 $given_name = $this->data['User']['value'];
    	    	         	 $this->set('results',$this->User->find('all',array('conditions' => array ('User.given_name =' => $given_name,'User.job_title =' => 'Technician'),'order'=>'surname ASC')));
    	    	    	    break; 
    	    	    	 
    	    	    	    case '1':
    	    	    	 	 $surname = $this->data['User']['value'];
    	    	    	 	 $this->set('results',$this->User->find('all',array('conditions' => array ('User.surname =' => $surname,'User.job_title =' => 'Technician'),'order'=>'surname ASC')));
    	    	    	    break;
    	    	    }
    	    	    } 
    	    
    	    }
    	    else{
    	    	 $this->set('results',$this->User->find('all',array('conditions' => array ('User.job_title =' => 'Technician'),'order'=>'surname ASC')));
    	    }
	}
	
	
	public function suspend($staff_id = null)
	{		
		date_default_timezone_set('Australia/Victoria');	              
           	   $this->User->id=$staff_id;
           	   if($this->User->saveField('working_state', 'Suspended'))
           	   	   {
           	   	   	   $this->Session->setFlash('This staff has been suspended.','default',array('class'=> 'flash-message-success')); 
           	   	   }
           	   	   else
           	           {
           	              $this->Session->setFlash('Unable to suspend this staff.','default',array('class'=> 'flash-message-warning'));
           	            }
           	            $this->redirect(array('controller'=>'users','action'=>'searchAdmin'));
	}
	
	public function activate($staff_id = null)
	{	
		date_default_timezone_set('Australia/Victoria');          
           	   $this->User->id=$staff_id;
           	   if($this->User->saveField('working_state', 'Activated'))
           	   	   {
           	   	   	   $this->Session->setFlash('This staff has been activated.','default',array('class'=> 'flash-message-success')); 
           	   	   }
           	   	   else
           	           {
           	              $this->Session->setFlash('Unable to activate this staff.','default',array('class'=> 'flash-message-warning'));
           	            }
           	            $this->redirect(array('controller'=>'users','action'=>'searchAdmin'));
	}

	public function editProfile()
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

		if($this->request->is('get'))
		{
			$this->data=$this->User->findByStaff_id($this->Auth->user('staff_id'));
		}
		else{
			$user=$this->Session->read('Auth.User');
			//upload phto
			$Imageconditions = array("User.staff_id" => $this->Auth->user('staff_id')); 
                        $Imageresults = $this->User->find('first', array('conditions' => $Imageconditions)); 
                        $currentImage = $Imageresults['User']['avatar_photo'];
                        
			$fileOK = $this->uploadFiles('img/Upload',  $this->data['User']['avatar_photo']);
			
			if(array_key_exists('urls', $fileOK)) 
                        { 
                             $this->request->data['User']['avatar_photo'] = '/img/Upload/'.$fileOK['urls'][0];                             
                             $user['avatar_photo']='/img/Upload/'.$fileOK['urls'][0];                           
                        } 
                        else 
                        { 
                              $this->request->data['User']['avatar_photo'] = $currentImage;                             
                        } 

                     //
			$this->request->data['User']['email_confirmation']= $this->request->data['User']['email_address'];
			$user['username']=$this->request->data['User']['username'];
			$user['given_name']=$this->request->data['User']['given_name'];
			$user['surname']=$this->request->data['User']['surname'];
			$user['email_address']=$this->request->data['User']['email_address'];
			$user['address']=$this->request->data['User']['address'];
			$user['city']=$this->request->data['User']['city'];
			$user['state']=$this->request->data['User']['state'];
			$user['postcode']=$this->request->data['User']['postcode'];
			$user['mobile']=$this->request->data['User']['mobile'];
			$user['home']=$this->request->data['User']['home'];
			
			if ($this->User->save($this->request->data))
			{
				$this->Session->write('Auth.User', $user);
				$this->Session->setFlash('Your profile has been updated.','default',array('class'=> 'flash-message-success'));
				$this->redirect(array('controller'=>'users','action'=>'editProfile'));
			}
			else
			{
				$this->Session->setFlash('Unable to update your profile.','default',array('class'=> 'flash-message-warning'));
			}
		}
	}
	public function fetchAllTechnicians()
       { 
       	       date_default_timezone_set('Australia/Victoria');       	       
               $technicians = $this->User->find('all',array('conditions' => array ('User.job_title' => array(2,3)),'order'=>'surname ASC'));
               $rows = array();
                               
               foreach ($technicians as $technician) {
                  	  $rows[] = array('id' => $technician['User']['staff_id'],
                                          'name' => $technician['User']['given_name'].' '.$technician['User']['surname'],                                   
                                          );
                }  

                  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);                   
       }
 // Password stuff	
 public function changePassword()
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

		if($this->request->is('post'))
		{
			//$this->data=$this->User->findByStaff_id($this->Auth->user('staff_id'));
			$session=$this->Session->read();
        	$id=$session['Auth']['User']['staff_id'];
        	$user=$this->User->find('first',array('conditions' => array('staff_id' => $id)));
        	$this->set('user',$user);
			if (!empty($this->data)) 
			{
            	//Current Password matches
				if ($this->Auth->password($this->data['User']['currentPassword'])==$user['User']['password']) 
				{
					if (!empty($this->data['User']['password'])) 
					{
                		// New Passwords match
						if ($this->data['User']['password']==$this->data['User']['confirmPassword']) 
						{
						//OVERLOADED
                		//$data=$this->data;
                		//$this->data=$user;
						//$this->data['User']['password']=$this->Auth->password($data['User']['password']);
                		$this->User->id=$id;
                		if($this->User->save($this->data))
						{
                			$this->Session->setFlash('Your password has been updated.','default',array('class'=> 'flash-message-success'));
							$this->redirect(array('controller'=>'users','action'=>'editProfile'));
						}
                		} else {
                    		$this->Session->setFlash('New passwords differ.','default',array('class'=> 'flash-message-warning'));
                		}
					} else {
                    	$this->Session->setFlash('Password field is empty.','default',array('class'=> 'flash-message-warning'));
                	}
            	} else {
                $this->Session->setFlash('Typed passwords did not match.','default',array('class'=> 'flash-message-warning'));
            	}
        }
		/*if ($this->User->save($this->request->data))
			{
				$this->Session->setFlash('Your password has been updated.','default',array('class'=> 'flash-message-success'));
				$this->redirect(array('controller'=>'users','action'=>'editProfile'));
			}*/
			else
			{
				$this->Session->setFlash('Unable to update your password.','default',array('class'=> 'flash-message-warning'));
			}
		}
	}
	
   function forgot_password(){
   	   date_default_timezone_set('Australia/Victoria');
        $this->layout=false;
        $this->User->recursive=-1;
        if(!empty($this->data))
        {
            if(empty($this->data['User']['email_address']))
            {
              $this->Session->setFlash('Please Provide Your Email Address that You used to Register with Us','default',array('class'=> 'flash-message-warning')); 
            }
            else
            {
                $UsersEmail=$this->data['User']['email_address'];
                $fu=$this->User->find('first',array('conditions'=>array('User.email_address'=>$UsersEmail)));
                if($fu)
                {
                    if($fu['User']['working_state']=='Activated')
                    {
                        $key = Security::hash(String::uuid(),'sha512',true);
                        $hash=sha1($fu['User']['username'].rand(0,100));
                        $url = Router::url( array('controller'=>'users','action'=>'reset_password'), true ).'/'.$key.'#'.$hash;
                        $ms=$url;
                        $ms=wordwrap($ms,1000);
                        //debug($url);
                        $fu['User']['token_hash']=$key;
                        $this->User->id=$fu['User']['staff_id'];
                        if($this->User->saveField('token_hash',$fu['User']['token_hash'])){                        
                             
                            //============Email================//
                            /* SMTP Options */ 
			    $ResetEmail = new CakeEmail('gmail');
                            $ResetEmail->template('reset_password');
			    $ResetEmail->to(array($fu['User']['email_address'] => $fu['User']['given_name']));
                            $ResetEmail->from(array('rjkor1@student.monash.edu' => 'DCC Reset password'));
                            $ResetEmail->subject('Reset your password for DCC Management system');
                            $ResetEmail->emailFormat('both');

			    $ResetEmail->viewVars(array('ms' => $ms));
                            $ResetEmail->send();
                            //$this->set('smtp_errors', $this->ResetEmail->smtpError);    
                             $this->Session->setFlash('Check your email to reset your password.','default',array('class'=> 'flash-message-success'));
                            //============EndEmail=============//    
                        }
                        else{
                        	$this->Session->setFlash('Error Generating Reset link.','default',array('class'=> 'flash-message-warning'));                           
                        }                        
                    }
                    else
                    {
                    	    $this->Session->setFlash('This account is suspended.','default',array('class'=> 'flash-message-warning'));
                    }
                }
                else
                {
                	$this->Session->setFlash('Email does not exist.','default',array('class'=> 'flash-message-warning'));
                }
            }
        }
    }
    function reset_password($token=null){
    	
        $this->layout='noneLayout';
        $this->User->recursive=-1;
        if(!empty($token)){
            $u=$this->User->findBytoken_hash($token);                        
            if($u){                           	    
                $this->User->id=$u['User']['staff_id'];
                if(!empty($this->data)){                    
                    $this->User->data=$this->data;
                    $this->User->data['User']['username']=$u['User']['username'];                    
                    $new_hash=sha1($u['User']['username'].rand(0,100));//created token
                    $this->User->data['User']['token_hash']=$new_hash;             
                    
                    if($this->data['User']['password']==$this->data['User']['confirmPassword']){                        
                        if($this->User->save($this->User->data))
                        {
                           $this->Session->setFlash('Password has been updated. You can login now.','default',array('class'=> 'flash-message-success'));
                        }
                         
                    }
                    else{
                         
                        $this->set('errors',$this->User->invalidFields());                        
                    }
                }
            }
            else
            {
                $this->Session->setFlash('The reset link works only for once.','default',array('class'=> 'flash-message-warning'));
            }
        }
         
        else{
        	
            $this->redirect('/');    
        }  
        }
}
?>