<?php
 class Appointment extends AppModel{
 	
 	public $name='Appointment';
 	public $primaryKey = 'appointment_id';
        public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'staff_id',
			'conditions' => '',
			'fields' => array('staff_id','surname','given_name'),
			'order' => ''
		),
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'conditions' => '',
			'fields' => array('patient_id','surname','given_name'),
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