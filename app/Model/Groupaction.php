	<?php
App::uses('AppModel', 'Model');
/**
 * Groupaction Model
 *
 * @property Group $Group
 * @property Actions $Actions
 */
class Groupaction extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'groups_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'groups_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
			),
		),
		'actions_id' => array(
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
		'Group' => array(
			'className' => 'Groups',
			'foreignKey' => 'groups_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Actions' => array(
			'className' => 'Actions',
			'foreignKey' => 'actions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
