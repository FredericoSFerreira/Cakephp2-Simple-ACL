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
	public $locale = 'esp';

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
				'message' => 'Error-notempty',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Error-numeric',
			),
		),
		'module_id' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Modules' => array(
			'className' => 'Modules',
			'foreignKey' => 'module_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
