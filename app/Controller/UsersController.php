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
class UsersController extends AppController {
    
    public function beforeFilter() {
        $this->Auth->allow('login','logout');
        parent::beforeFilter();
    }
    
    public function initDB() {
        $this->syncACL();
        $this->redirect(array('action' => 'home'));
    }
    
    
    public function post_login(){

            $this->User->set($this->data);
            if($this->User->validates())
            {
                if( $this->Auth->login())
                {
                    return $this->redirect($this->Auth->redirect());
                }
                else
                {
                    $this->_flash(__('msg-login-error',true),'alert alert-warning');
                }
            }


    }

    public function get_login(){

        if($this->Auth->user('id')){
            $this->redirect(array('action' => 'home'));
        }

    }

    public function login() {

        $this->layout = 'login';

        if ($this->request->is('post')) {
            $this->post_login();
        }else{

            if ($this->request->is('get')) {
                $this-> get_login();
            }

        }
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }
    
    
    public function home($category_id = null) {

        if(isset($category_id)){
            $this->setSidebarMenu($category_id);
        }
        
    }
    
    
    public function add() {
        
        $groups = $this->Group->find('list',array(
            'fields'=>array(
                'id','name'
            )
        ));
        
        $this->set(compact('groups'));
        
        if ($this->request->is('post')) {
            $this->User->create();
            $this->User->set($this->data);
            if ($this->User->save()) {
                $this->Session->setFlash(__('The User has been saved'));
                $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('The User could not be saved. Please, try again.'));
            }
        }
	}
    
}
