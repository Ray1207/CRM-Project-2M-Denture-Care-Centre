<?php
class  SystemsController extends AppController {
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
                    
    }
}
?>