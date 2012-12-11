<?php
App::uses('Technology', 'Model');

/**
 * Technology Test Case
 *
 */
class TechnologyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.technology',
		'app.event',
		'app.city',
		'app.technologies_event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Technology = ClassRegistry::init('Technology');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Technology);

		parent::tearDown();
	}

}
