<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class GroupsController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    public function post_add(){

            $this->Group->set($this->data);
            if($this->Group->validates())
            {
                if ($this->Group->save()) {
                    $this->_flash(__('msg-groups-save',true),'alert alert-warning');
                    $this->redirect(array('action' => 'add'));
                }
            }
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->post_add();
        }
    }

}
