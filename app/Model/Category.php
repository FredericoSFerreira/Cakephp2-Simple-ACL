<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Modules $Modules
 */
class Category extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
		'order' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
			),
		),
		'modules_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Modules' => array(
			'className' => 'Modules',
			'foreignKey' => 'modules_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
