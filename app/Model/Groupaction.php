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

	public $locale = 'esp';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Error-notempty-list',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Error-numeric',
			),
		),
		'action_id' => array(
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
		'Group' => array(
			'className' => 'Groups',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Actions' => array(
			'className' => 'Actions',
			'foreignKey' => 'action_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
