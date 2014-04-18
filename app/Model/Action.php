<?php
App::uses('AppModel', 'Model');
/**
 * Action Model
 *
 * @property Categories $Categories
 */
class Action extends AppModel {

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
				'message' => 'Error-notempty',
			),
		),
		'url' => array(
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
		'category_id' => array(
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
		'Categories' => array(
			'className' => 'Categories',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
