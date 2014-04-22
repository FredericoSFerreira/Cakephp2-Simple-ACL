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
            
            $this->ajaxVariablesInit();
            $this->User->set($this->data);
            if($this->User->validates())
            {
                if( $this->Auth->login())
                {
                    $this->dataajax['response']['redirect']=$this->Auth->redirect();
                }
                else
                {
                    $this->dataajax['response']['message_error']=__('Login-error',true);
                }
            }else{
                 $this->errorsajax['User'] = $this->User->validationErrors;
                 $this->dataajax['response']["errors"]= $this->errorsajax;
            }

            echo json_encode($this->dataajax);


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
        $this->_flash(__('Logout-success',true),'alert alert-success');
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
            $this->Paginator->settings = array(
                'limit' => 10,
                'order' => 'User.id ASC',
                'recursive'=>1,
            );
            $lists = $this->Paginator->paginate('User');
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
            
            $this->ajaxVariablesInit();

            $this->User->create();
            $this->User->set($this->data);
            if($this->User->validates())
            {
                try{
                    if ($this->User->save()) {
                        $this->dataajax['response']['message_success']=__('Save-success',true);
                    }
                }catch (Exception $e) {
                        $this->dataajax['response']['message_error']=__('Save-error',true);
                }
            }else{
                 $this->errorsajax['User'] = $this->User->validationErrors;
                 $this->dataajax['response']["errors"]= $this->errorsajax;
            }

            echo json_encode($this->dataajax);
                

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
                $this->_flash(__('No-exist-record',true),'alert alert-warning');
                $this->redirect(array('action' => 'admin_edit'));
            }else{
                $this->request->data = $this->User->read(null, $id);
                $this->set(compact('id'));
            }

        }
        /*----------------get_edit-----------------*/

        /*----------------post_edit-----------------*/
        public function post_edit($id){

                $this->ajaxVariablesInit();

                $this->User->id = $id;
                $this->User->set($this->data);
                if($this->User->validates())
                {
                    try{
                        if ($this->User->save()) {
                            $this->_flash(__('Update-success',true),'alert alert-success');
                            $this->dataajax['response']['redirect']='/admin/users/edit/';
                        }
                    }catch (Exception $e) {
                        $this->dataajax['response']['message_error']=__('Update-error',true);
                    }
                }else{
                     $this->errorsajax['User'] = $this->User->validationErrors;
                     $this->dataajax['response']["errors"]= $this->errorsajax;
                }

                echo json_encode($this->dataajax);
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
        public function admin_delete($id=null){

            if(!empty($id)){
                $this->User->id = $id;
                if (!$this->User->exists()) {
                    $this->_flash(__('No-exist-record', true),'alert alert-danger');
                    $this->redirect(array('action' => 'admin_delete'));
                }   

                try{
                    if ($this->User->delete($id,true)) {
                        $this->_flash(__('Delete-success', true),'alert alert-success');
                        $this->redirect(array('action' => 'admin_delete'));
                    }
                }catch (Exception $e) {
                        $this->_flash(__('Delete-error', true),'alert alert-warning');
                        $this->redirect(array('action' => 'admin_delete'));
                }
            }else{
                $this->get_index();
            }

        }
        /*----------------delete-----------------*/

    /*----------------DELETE-----------------*/


}
