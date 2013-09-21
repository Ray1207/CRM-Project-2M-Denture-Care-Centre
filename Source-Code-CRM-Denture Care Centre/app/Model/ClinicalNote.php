<?php
App::uses('AppModel', 'Model');

class ClinicalNote extends AppModel {

	public $primaryKey = 'clinical_notes_id';

	public $belongsTo = array(
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'fields' => array('surname','given_name'),
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'staff_id',
			'conditions' => '',
			'fields' => array('staff_id','surname','given_name'),
			'order' => ''
		)
	);
	
}
