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
        parent::beforeFilter();
    }
    
    public function initDB() {
        $group = $this->User->Group;
        
        //Administrador
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');
        
        App::uses('ShellDispatcher', 'Console');
        $command = '-app '.APP.' AclExtras.AclExtras aco_sync';
        $args = explode(' ', $command);
        $dispatcher = new ShellDispatcher($args, false);
        $dispatcher->dispatch();
        
        
        $this->redirect(array('action' => 'home'));
    }
    
    
    public function post_login(){

        if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
        } else {
                $this->Session->setFlash('Your username or password was incorrect.');
        }

    }

    public function get_login(){
        

    }

    public function login() {
        if ($this->request->is('post')) {
            $this->post_login();
        }else{

            if ($this->request->is('get')) {
                $this-> get_login();
            }

        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
    
    public function acladmin($access = null , $aro = null, $aco = null, $id =null){
        
        if((isset($access))&&(isset($aro))&&(isset($aco))){
            $this->ArosAcos->create();
            if(!empty($id)){
                $this->ArosAcos->id = $id;
            }
            
            if($access == 0){ $access ='1';}else{$access ='-1';}
            
            $this->ArosAcos->set('aro_id' , $aro);
            $this->ArosAcos->set('aco_id' , $aco);
            $this->ArosAcos->set('_create' , $access);
            $this->ArosAcos->set('_read', $access);
            $this->ArosAcos->set('_update', $access);
            $this->ArosAcos->set('_delete', $access);
            
            if ($this->ArosAcos->save()) {
                $this->Session->setFlash(__('The ArosAcos has been saved'));
                $this->redirect(array('action' => 'acladmin'));
            } else {
                $this->Session->setFlash(__('The ArosAcos could not be saved. Please, try again.'));
            }
            
        }
        
        $acos = $this->Aco->find('all',array(
            'recursive'=>-1
        ));
        
        $aros = $this->Aro->find('all',array(
            'conditions'=>array(
                'model' =>'Group'
            )
        ));
        
        
        $accessgroup = array();
        foreach ($aros as $aro){
            $aroid = $aro['Aro']['id'];
            foreach ($aro['Aco'] as $aco){
                
                $idaco = $aco['id'];
                
                $acopermission= $aco['Permission'];
                
                if($acopermission['_create']){
                    
                    $accessgroup[$aro['Aro']['foreign_key']]['idpermission-'.$idaco]=$acopermission['id'];
                    $accessgroup[$aro['Aro']['foreign_key']][$idaco]=$acopermission['_create'];
                }
                   
            }
        }
        
        
        
        $groups = $this->Group->find('all',
            array(
                'joins' => array(
                    array(
                        'table' => 'aros',
                        'alias' => 'Aros',
                        'type' => 'inner',
                        'conditions' => array(
                            'Group.id = Aros.foreign_key',
                            'Aros.model' =>'Group'
                        )
                    )
                ),
                'fields' =>array('*')
            )
        );
        
        $this->set(compact('acos','groups','accessgroup'));
        
    }
    
    public function home() {
        
    }
    
    
    public function register() {
        
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
                $this->redirect(array('action' => 'register'));
            } else {
                $this->Session->setFlash(__('The User could not be saved. Please, try again.'));
            }
        }
	}
    
}
