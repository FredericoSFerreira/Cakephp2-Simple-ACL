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
				'message' => 'Error-notempty',
			),
		),
		'order' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Error-notempty-list',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Error-numeric',
			),
		),
    );

}
