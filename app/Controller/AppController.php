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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $uses       = array('Aco','Aro','ArosAcos','User','Group','Module','Category','Groupaction');
    public $helpers = array('Form', 'Html','Session','Time','Form' => array('className' => 'BootstrapForm'));

    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );

    public function beforeFilter() {        
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login','plugin' => false,'admin' => false);
        $this->Auth->loginRedirect = '/users/home/';
		$this->Auth->authError = "Access Denied";
        $this->Auth->logoutRedirect = '/users/login';
		$this->Auth->allowedActions= array('login','logout');
        $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
                'fields' => array(
                    'username' => 'username',
                    'password' => 'password'),
                'userModel' => 'User'
            ), 'Form'
        );

        $this->is_Authorizate();
        
    }

    public function syncACL() {

        $group = $this->User->Group;
        $group->id = 1;
        $this->Acl->allow(array( 'model' => 'Group', 'foreign_key' => 1), 'controllers');

        App::uses('ShellDispatcher', 'Console');
        $command = '-app '.APP.' AclExtras.AclExtras aco_sync';
        $args = explode(' ', $command);
        $dispatcher = new ShellDispatcher($args, false);
        $dispatcher->dispatch();
    }

    public function install_acl($cont_group,$cont_users){

        //pr($this->params);
        
        $redirect = 1;

        if($cont_group == 0){

            if($this->params["controller"] == "groups"){
                $this->Auth->allow('add');
                
                

                if($this->params["action"] == "add"){
                    $redirect =0;
                }


            }

            if($redirect){
                $this->redirect(array('controller' => 'groups','action' => 'add'));
            }
            
        }else{

            if($cont_users == 0){
                if($this->params["controller"] == "users"){
                    $this->Auth->allow('add');

                    if($this->params["action"] == "add"){
                        $redirect =0;
                    }
                    
                    if($redirect){
                        $this->redirect(array('controller' => 'users','action' => 'add'));
                    }

                }else{
                    if($this->params["controller"] == "groups"){
                        $this->redirect(array('controller' => 'users','action' => 'add'));
                    }
                }
                
            }else{

                if($cont_users == 1){

                    $this->syncACL();

                    if($this->params["controller"] == "users"){
                        if(($this->params["action"] != "login")||($this->params["action"] != "logout")){
                          $redirect =0;

                          if($redirect){
                            $this->redirect(array('controller' => 'users','action' => 'logout'));
                            }

                        }

                        

                    }
 
                }

            }

        }

        

        

    }


    public function is_Authorizate(){


        $cont_group = $this->Group->find("count",array(
            "recursive" => "-1"
        ));
        $cont_users = $this->User->find("count",array(
            "recursive" => "-1"
        ));

        if(($cont_group == 0) || ($cont_group == 1) || ($cont_users == 0)){
            $this->install_acl($cont_group, $cont_users);
        }
        
    }

    function _flash($message,$type='message')
        {
        $messages = (array)$this->Session->read('Message.multiFlash');
        $messages[] = array(
            'message'=>$message, 
            'layout'=>'default', 
            'element'=>'default',
            'params'=>array('class'=>$type),
            );
        $this->Session->write('Message.multiFlash', $messages);
    }


    
    
}