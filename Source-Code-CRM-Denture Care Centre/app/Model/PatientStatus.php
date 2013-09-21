<?php
 class PatientStatus extends AppModel{
 	
 	public $name='PatientStatus';
 	public $primaryKey = 'status_id';
 	 	public $validate = array(
 		'name'=>array(
 			'Please enter a status name.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please enter a status name.'
 				)
 		 ),
 		'description'=>array(
 			'Description'=>array(
 			'rule'=>'notEmpty',
                        'message'=>'*Please enter a status description.'
                         )
                  )
 	);	
 }
?>