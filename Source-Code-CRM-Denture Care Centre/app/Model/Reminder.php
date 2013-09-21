<?php
 class Reminder extends AppModel{
 	
 	public $name='Reminder';
 	public $primaryKey = 'reminder_id';
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'staff_id',
			'conditions' => '',
			'fields' => array('staff_id','surname','given_name'),
			'order' => ''
		)
	);
 }
?>