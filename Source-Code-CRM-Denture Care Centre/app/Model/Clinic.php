<?php
 class Clinic extends AppModel{
 	
 	public $name='Clinic';
 	public $primaryKey = 'clinic_id';
 	 	public $validate = array(
 		'street_address'=>array(
 			'Please enter address.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please enter street address.'
 				)
 		 ),
 		'city'=>array(
 			'Please enter city.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please enter suburb name.'
 				)
 		 ),
 		'state'=>array(
 			'Please select state.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please select state.'
 				)
 		 ),
 		'postcode'=>array(
 			'Please enter postcode.'=>array(
 				'rule'=>'/^[0-9]*$/',
 				'message'=>'*Please enter valid postcode.'
 				)
 		 )
 	);	
 }
?>