<?php
class AvailabilitiesController  extends AppController {
	public $helpers = array('Html');
	
        public function index($technician_id=null) {          	     
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
                     $this->set('technicainId',$technician_id);
                $this->set('technician_name', $this->Availability->User->find('all',array('conditions'=>array('User.staff_id'=>$technician_id))));

                $clinicCollection = $this->Availability->Clinic->find('all',array('order'=>'city ASC'));
              $arrClinics = array();
              for ($a=0; count($clinicCollection)> $a; $a++) {
                  	  $arrClinics[$clinicCollection[$a]['Clinic']['clinic_id']]=$clinicCollection[$a]['Clinic']['city'];
                  }
              $this->set('clinics',$arrClinics);
         }
   public function feed() {
   	   date_default_timezone_set('Australia/Victoria');
   	   
                 //1. Transform request parameters to MySQL datetime format.
                  $mysqlstart = date( 'Y-m-d H:i:s', substr($this->params['url']['start'],0,10));
                  $mysqlend = date('Y-m-d H:i:s', substr($this->params['url']['end'],0,10));
                  $technicainId=$this->params['url']['techId'];
                  $clinic = $this->params['url']['clinic'];
                   //2. Get the events corresponding to the time range
                  $conditions = array( 'AND'=>array(
                  	  'Availability.startTime BETWEEN ? AND ?' => array($mysqlstart,$mysqlend),
                  	  'Availability.belongsTo'=>$technicainId,'Availability.clinic'=>$clinic
                  	  ));
                  $availabilitys = $this->Availability->find('all',array('conditions' =>$conditions));
                  //3. Create the json array
                  $rows = array();
                  
                  for ($a=0; count($availabilitys)> $a; $a++) {
                  	  $rows[] = array('id' => $availabilitys[$a]['Availability']['availability_id'],
                                          'start' => date('Y-m-d H:i', strtotime($availabilitys[$a]['Availability']['startTime'])),
                                          'end' => date('Y-m-d H:i',strtotime($availabilitys[$a]['Availability']['endTime'])),
                                          'body' => $availabilitys[$a]['Availability']['description'],
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
         public function addAvalaibility()
         {
         	 date_default_timezone_set('Australia/Victoria');
        	 if ($this->request->is('post')){    
         	 	$start=$this->request->data['start'];
         	 	$newStart=substr($start,0,24);
         	 	$end=$this->request->data['end'];
         	 	$newEnd=substr($end,0,24);
         	 	$body=$this->request->data['body'];
         	 	$belongsTo=$this->request->data['belongsTo'];
         	 	$clinic=$this->request->data['clinic'];
         	 	
         	 	$this->request->data['Availability']['clinic']=$clinic;  
         	    	$this->request->data['Availability']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
         	    	$this->request->data['Availability']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));       	    	
         	    	$this->request->data['Availability']['description']=$body;
         	    	$this->request->data['Availability']['belongsTo']=$belongsTo;         	    	
         	    	$this->request->data['Availability']['lastModifiedBy']=$this->Auth->user('staff_id');
         	   
    	    	    if ($this->Availability->save($this->request->data)){
    	    	    }
    	    	    else {                                                                                                                                         
    	    	    	    $this->Session->setFlash('Unable to save this availabiliy.','default',array('class'=> 'flash-message-warning')); 
    	    	    }   
    	    	     	    	    
    	    	  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
    	    }
         }
         public function editAvailability(){
         	 date_default_timezone_set('Australia/Victoria');
               if($this->request->is('post'))
   	       {
   	       	        $avl_id=$this->request->data['id'];
   	       	        if($avl_id==null)return;
         	 	$start=$this->request->data['start'];
         	 	$newStart=substr($start,0,24);
         	 	$end=$this->request->data['end'];
         	 	$newEnd=substr($end,0,24);
         	 	$body=$this->request->data['body'];
         	 	
         	 	$this->request->data['Availability']['availability_id']=$avl_id;
         	 	$this->request->data['Availability']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
         	    	$this->request->data['Availability']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));       	    	
         	    	$this->request->data['Availability']['description']=$body;    	    	
         	    	$this->request->data['Availability']['lastModifiedBy']=$this->Auth->user('staff_id');
         	    	
         	    	 if ($this->Availability->save($this->request->data)){
    	    	           }
    	    	          else {                                                                                                                                         
    	    	    	    $this->Session->setFlash('Unable to save this availability.','default',array('class'=> 'flash-message-warning')); 
    	    	          } 
    	    	          
               }
               Configure::write('debug', 0);
               $this->autoRender = false;
               $this->autoLayout = false;
        }
        public function deleteAvailability(){
              $avl_id=$this->request->data['id'];        	
              if($this->Availability->delete($avl_id)){
   	      }
   	      else 
		{
                   $this->Session->setFlash('Unable to delete this availability.','default',array('class'=> 'flash-message-warning'));
                }
                Configure::write('debug', 0);
               $this->autoRender = false;
               $this->autoLayout = false;
        } 
        
        public function dropResizeSaving()
        {
        	date_default_timezone_set('Australia/Victoria');
        	if($this->request->is('post'))
   	       {
   	       	        $avl_id=$this->request->data['id'];
   	       	        if($avl_id==null)return;
         	 	$start=$this->request->data['start'];
         	 	$newStart=substr($start,0,24);
         	 	$end=$this->request->data['end'];
         	 	$newEnd=substr($end,0,24);
         	 	
         	 	
         	 	$this->request->data['Availability']['availability_id']=$avl_id;
         	 	$this->request->data['Availability']['startTime']=date('Y-m-d H:i:s' , strtotime($newStart));
         	    	$this->request->data['Availability']['endTime']=date('Y-m-d H:i:s' , strtotime($newEnd));       	    	   	    	
         	    	$this->request->data['Availability']['lastModifiedBy']=$this->Auth->user('staff_id');
         	    	
         	    	 if ($this->Availability->save($this->request->data)){
    	    	           }
    	    	          else {                                                                                                                                         
    	    	    	    $this->Session->setFlash('Unable to save this availability.','default',array('class'=> 'flash-message-warning')); 
    	    	          } 
               }
               Configure::write('debug', 0);
               $this->autoRender = false;
               $this->autoLayout = false;
        }
       public function fetchAvailableTechnicians()
       { 
       	       date_default_timezone_set('Australia/Victoria');
       	       
       	       $start=$this->request->data['appStart'];
       	       $newStart=substr($start,0,24);
               $startTime=date('Y-m-d H:i:s' , strtotime($newStart));
               $end=$this->request->data['appEnd'];
               $newEnd=substr($end,0,24);
               $endTime=date('Y-m-d H:i:s' , strtotime($newEnd));
               $conditions = array( "and" => array(
               	       "Availability.startTime <="=>$startTime,
               	       "Availability.endTime >="=>$endTime,
               	       ));
                  $technicians = $this->Availability->find('all',array('conditions' =>$conditions,'fields' => 'DISTINCT Availability.belongsTo'));
                   $rows = array();
                  
               
                  for ($a=0; count($technicians)> $a; $a++) {
                  	  $technicianId=$technicians[$a]['Availability']['belongsTo'];
                  	  $technician = $this->Availability->User->find('all',array('conditions' => array ('User.staff_id' =>$technicianId)));

                  	  $rows[] = array('id' => $technicianId,
                                          'name' => $technician[0]['User']['given_name'].' '.$technician[0]['User']['surname'],                                   
                                          );
                  }  

                  Configure::write('debug', 0);
                  $this->autoRender = false;
                  $this->autoLayout = false;
                  $this->header('Content-Type: application/json');
                  echo json_encode($rows);                   
       }
}
?>