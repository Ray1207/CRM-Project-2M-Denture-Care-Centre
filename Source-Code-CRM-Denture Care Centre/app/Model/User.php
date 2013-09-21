<?php
 class User extends AppModel{
 	
 	public $name='User';
 	
 	public $primaryKey = 'staff_id';
 	
 	public $hasMany = array(
		'Appointment' => array(
			'className' => 'Appointment',
			'foreignKey' => 'appointment_id'
		),
		'Reminder' => array(
			'className' => 'Reminder',
			'foreignKey' => 'reminder_id'
		)
	);
	public $belongsTo = array(
		'JobTitle' => array(
			'className' => 'JobTitle',
			'foreignKey' => 'job_title'
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
 		'job_title'=>array(
 			'Please select job title.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please select job title.'
 				)
 		 ),
 		'gender'=>array(
 			'Please select gender.'=>array(
 				'rule'=>'notEmpty',
 				'message'=>'*Please select gender.'
 				)
 		 ),
 		'email_address'=>array(
 			'Valid email'=>array(
 				'rule'=>'email',
 				'message'=>'*Please enter a valid email address.'
 				),
 			'Unique email'=>array(
 				'rule'=>'isUnique',
 				'message'=>'*This email has already been taken.'
 				),
 			'Match emails'=> array(
 				'rule'=>'emailsMatching',
 				'message'=>'*The emails do not match.'
 				)
 		 ),
 		'address'=>array(
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
 				'allowEmpty'=>false, 
 				'message'=>'*Please enter valid postcode.'
 				)
 		 ),
 		'mobile'=>array(
 			'mobileVal'=>array(
 			'rule'=>'notEmpty', 
                        'message'=>'*Please enter mobile number.'
                         )
                  ),
                'username'=>array(
 			'usernameVal'=>array(
 			'rule'=>'notEmpty', 
                        'message'=>'*Please enter username.'
                         )
                  )
 	);
 	
 	public function emailsMatching($data)
 	{
 		if($data['email_address']==$this->data['User']['email_confirmation']){
 			return true;
 		}
 		$this->invalidate('email_confirmation','*The emails do not match.');
 	}
 	
 	 public function beforeSave() {
 	 	 if (isset($this->data['User']['password'])){
 	 	 	 $this->data['User']['password']= AuthComponent::password($this->data['User']['password']);
 	 	 }
 	 	 return true;
 	 }
 }
?>