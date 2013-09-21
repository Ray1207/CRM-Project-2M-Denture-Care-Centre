<?php
 class JobTitle extends AppModel{
 	
 	public $name='JobTitle';
 	public $primaryKey = 'job_title_id';
 	 	public $validate = array(
 		'description'=>array(
 			'Please enter a job title.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please enter a job title.'
 				)
 		 )
 	);	
 }
?>