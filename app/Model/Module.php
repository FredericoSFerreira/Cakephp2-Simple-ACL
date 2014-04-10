<?php
App::uses('AppModel', 'Model');
/**
 * Module Model
 *
 */


class Module extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

	public $validate = array(
        'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Error',
			),
		),
		'order' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Error',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
			),
		),
    );

}
