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
				'message' => 'Your custom message here',
			),
		),
		'url' => array(
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
		'categories_id' => array(
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
		'Categories' => array(
			'className' => 'Categories',
			'foreignKey' => 'categories_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
