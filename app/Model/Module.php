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
	public $actsAs = array(
         'Acl' => array('type' => 'requester'),
         'Translate' => array(
            'name' => 'GroupnameTranslation'
        )
    );

    public $locale = 'esp';


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
    );

    public function parentNode() {
        return null;
    }

}
