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
        $this->Auth->allow('admin_login','admin_logout');
        parent::beforeFilter();
    }
    
    public function admin_initDB() {
        $this->syncACL();
        $this->redirect(array('action' => 'admin_home'));
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
            $this->redirect(array('action' => 'admin_home'));
        }

    }

    public function admin_login() {

        $this->layout = 'login';

        if ($this->request->is('post')) {
            $this->post_login();
        }else{

            if ($this->request->is('get')) {
                $this-> get_login();
            }

        }
    }

    public function admin_logout() {
        $this->Session->destroy();
        $this->_flash(__('Sesión Cerrada Exitosamente',true),'alert alert-success');
        $this->redirect($this->Auth->logout());
    }
    
    
    public function admin_home($category_id = null) {

        if(isset($category_id)){
            $this->setSidebarMenu($category_id);
        }
        
    }
    
     /*----------------INDEX-----------------*/

        /*----------------get_index-----------------*/
        public function get_index(){
            $this->User->paginate = array(
                'order' => 'User.id ASC',
                'limit' => 10
            );
            $lists = $this->paginate('User');
            $this->set(compact('lists'));
        }
        /*----------------get_index-----------------*/

        /*----------------index-----------------*/
        public function admin_index(){

            if ($this->request->is('get')) {
                $this->get_index();
            }
        }
        /*----------------index-----------------*/

    /*----------------INDEX-----------------*/



    /*----------------ADD-----------------*/

        /*----------------post_add-----------------*/
        public function post_add(){
            
            $this->User->create();
            $this->User->set($this->data);
            if($this->User->validates())
            {
                if ($this->User->save()) {
                    $this->_flash(__('msg-user-save',true),'alert alert-success');
                } else {
                     $this->_flash(__('msg-user-errorsave',true),'alert alert-warning');
                }
                $this->redirect(array('action' => 'admin_add'));
            }
                

        }
        /*----------------post_add-----------------*/

        /*----------------add-----------------*/
        public function admin_add() {

            $form_config = array();
            $form_config["title"] = "Agregar Usuario";
            $form_config["urlform"] = "admin_add";
            $form_config["labelbutton"] = "Agregar";
            $this->set('form_config',$form_config);

            if ($this->request->is('post')) {
                $this->post_add();
            }

            $groups = $this->Group->find('list',array(
                    'fields'=>array(
                        'id','name'
                    )
            ));
                
            $this->set(compact('groups'));

        }
        /*----------------add-----------------*/

    /*----------------ADD-----------------*/

    
    /*----------------EDIT-----------------*/

        /*----------------get_edit-----------------*/
        public function get_edit($id){

            $this->User->id = $id;
            if (!$this->User->exists()) {
                $this->_flash(__('msg-users-edit-noexist',true),'alert alert-warning');
                $this->redirect(array('action' => 'admin_edit'));
            }else{
                $this->request->data = $this->User->read(null, $id);
                $this->set(compact('id'));
            }

        }
        /*----------------get_edit-----------------*/

        /*----------------post_edit-----------------*/
        public function post_edit($id){

                $this->User->set($this->data);
                if($this->User->validates())
                {
                    if ($this->User->save()) {
                        $this->_flash(__('msg-users-update',true),'alert alert-warning');
                        $this->redirect(array('action' => 'admin_edit'));
                    }
                }
                $this->set(compact('id'));
        }
        /*----------------post_edit-----------------*/

        /*----------------edit-----------------*/
        public function admin_edit($id=null){

            $form_config = array();
            $form_config["title"] = "Editar Usuario";
            $form_config["urlform"] = "admin_edit";
            $form_config["labelbutton"] = "Guardar";            
            $this->set('form_config',$form_config);

            $groups = $this->Group->find('list',array(
                    'fields'=>array(
                        'id','name'
                    )
            ));
                
            $this->set(compact('groups'));

            if ($this->request->is('get')) {
                if(empty($id)){
                    $this->get_index();
                }else{
                    $this->get_edit($id);
                }
            }else{
                if ($this->request->is('post')) {
                    $this->post_edit($id);
                }
            }

        }
        /*----------------edit-----------------*/

    /*----------------EDIT-----------------*/


    /*----------------DELETE-----------------*/

        /*----------------delete-----------------*/
        public function delete($id=null){

            if(!empty($id)){
                $this->User->id = $id;
                if (!$this->User->exists()) {
                    $this->_flash(__('Debe seleccionar un item a eliminar', true),'alert alert-danger');
                    $this->redirect(array('action' => 'admin_delete'));
                }   

                if ($this->User->delete($id,true)) {
                    $this->_flash(__('Registro borrado de forma exitosa', true),'alert alert-success');
                    $this->redirect(array('action' => 'admin_delete'));
                }
            }else{
                $this->get_index();
            }

        }
        /*----------------delete-----------------*/

    /*----------------DELETE-----------------*/


}
