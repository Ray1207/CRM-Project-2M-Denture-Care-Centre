<?php
 class Patient extends AppModel{
 	
 	public $name='Patient';
 	public $primaryKey = 'patient_id';
 	
 	public $belongsTo = array(
		'PatientType' => array(
			'className' => 'PatientType',
			'foreignKey' => 'patient_type'
		)
	);
 	 	public $validate = array(
 		'given_name'=>array(
 			'Please enter given name.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please enter given name.'
 				)
 		 ),
 		'surname'=>array(
 			'Please enter surname.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please enter surname.'
 				)
 		 ),
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
 		 ),
 		'mobile'=>array(
 			'mobileVal'=>array(
 			'rule'=>'notEmpty',
                        'message'=>'*Please enter mobile number.'
                         )
                  )
 	);	
 }
?>