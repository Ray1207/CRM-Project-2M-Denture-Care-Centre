<?php
/**
 * ClinicalNoteFixture
 *
 */
class ClinicalNoteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'clinical_notes_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'patient_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'staff_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'catagory' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'body' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created_time' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified_time' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'clinical_notes_id', 'unique' => 1), 'patient_id' => array('column' => 'patient_id', 'unique' => 0), 'staff_id' => array('column' => 'staff_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'clinical_notes_id' => 1,
			'patient_id' => 'Lorem ipsum dolor sit amet',
			'staff_id' => 1,
			'catagory' => 'Lorem ipsum dolor sit amet',
			'title' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet',
			'created_time' => '2012-05-14 07:41:22',
			'modified_time' => '2012-05-14 07:41:22'
		),
	);
}
