<?php
 class Availability extends AppModel{
 	
 	public $name='Availability';
 	public $primaryKey = 'availability_id';
        public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'belongsTo',
			'conditions' => '',
			'fields' => array('staff_id','surname','given_name'),
			'order' => ''
		),
		'Clinic' => array(
			'className' => 'Clinic',
			'foreignKey' => 'clinic',
			'conditions' => '',
			'order' => ''
		)
	);	
 }
?>