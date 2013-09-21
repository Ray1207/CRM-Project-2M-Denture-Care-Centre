<?php
App::uses('ClinicalNote', 'Model');

/**
 * ClinicalNote Test Case
 *
 */
class ClinicalNoteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.clinical_note', 'app.patient', 'app.staff');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ClinicalNote = ClassRegistry::init('ClinicalNote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClinicalNote);

		parent::tearDown();
	}

}
