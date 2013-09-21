<?php
 class JobStatus extends AppModel{
 	
 	public $name='JobStatus';
 	
 	public $primaryKey = 'job_status_id';
 	
	public $belongsTo = array(
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id'
		)
		,
		'PatientStatus' => array(
			'className' => 'PatientStatus',
			'foreignKey' => 'patient_status_id'
		)
	);
 }
?>