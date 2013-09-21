<?php
 class PatientType extends AppModel{
 	
 	public $name='PatientType';
 	public $primaryKey = 'patient_type_id';
 	 	public $validate = array(
 		'description'=>array(
 			'Description.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please enter a type description.'
 				)
 		 )
 	);	
 }
?>