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

    public $uses       = array('Aco','Aro','ArosAcos','User','Group','Module','Category','Groupaction','Action');
    public $helpers = array('Form', 'Html','Session','Time','Form' => array('className' => 'BootstrapForm'),'Minify.Minify');

    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
        'Paginator'
    );

    public function beforeFilter() {        
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login','plugin' => false,'admin' => true);
        $this->Auth->loginRedirect = '/admin/users/home/';
		$this->Auth->authError = __("msg-access-noAuth");
        $this->Auth->logoutRedirect = '/admin/users/login/';
		$this->Auth->allowedActions= array('admin_login','admin_logout');
        $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
                'fields' => array(
                    'username' => 'username',
                    'password' => 'password'),
                'userModel' => 'User'
            ), 'Form'
        );

        $this->set('action',$this->params["action"]);
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

        $this->_flash(__('msg-acl-syncSuccess',true),'alert alert-success');
    }

    public function installBase(){

//        SET FOREIGN_KEY_CHECKS = 0;
// TRUNCATE groupactions;
// TRUNCATE actions;
// TRUNCATE categories;
// TRUNCATE modules;
// SET FOREIGN_KEY_CHECKS = 1;


        $data_modules = array(
            array(
                'Module'=> array(
                    'id' => 1,
                    'name' => 'Sistema Base',
                    'order' => 99
                )
            )
        );

        $data_categories = array(
            array(
                'Category'=> array(
                    'id' => 1,
                    'name' => 'Grupos',
                    'module_id' => 1,
                    'order' => 0
                )
            ),
            array(
                'Category'=> array(
                    'id' => 2,
                    'name' => 'Modulos',
                    'module_id' => 1,
                    'order' => 1
                )
            ),
            array(
                'Category'=> array(
                    'id' => 3,
                    'name' => 'Categorias',
                    'module_id' => 1,
                    'order' => 2
                )
            ),
            array(
                'Category'=> array(
                    'id' => 4,
                    'name' => 'Funciones',
                    'module_id' => 1,
                    'order' => 3
                )
            ),
            array(
                'Category'=> array(
                    'id' => 5,
                    'name' => 'Permisos',
                    'module_id' => 1,
                    'order' => 4
                )
            ),
            array(
                'Category'=> array(
                    'id' => 6,
                    'name' => 'Usuarios',
                    'module_id' => 1,
                    'order' => 5
                )
            ),
        );

$data_actions = array(
array(
'Action'=> array('id' => 1,'name' => 'Grupos : Listado','url' => '/admin/groups/index','category_id' => 1,'order' => 0)
),
array(
'Action'=> array('id' => 2,'name' => 'Grupos : Agregar','url' => '/admin/groups/add','category_id' => 1,'order' => 1)
),
array(
'Action'=> array('id' => 3,'name' => 'Grupos : Editar','url' => '/admin/groups/edit','category_id' => 1,'order' => 2)
),
array(
'Action'=> array('id' => 4,'name' => 'Grupos : Eliminar','url' => '/admin/groups/delete','category_id' => 1,'order' => 3)
),

array(
'Action'=> array('id' => 5,'name' => 'Modulos : Listado','url' => '/admin/modules/index','category_id' => 2,'order' => 0)
),
array(
'Action'=> array('id' => 6,'name' => 'Modulos : Agregar','url' => '/admin/modules/add','category_id' => 2,'order' => 1)
),
array(
'Action'=> array('id' => 7,'name' => 'Modulos : Editar','url' => '/admin/modules/edit','category_id' => 2,'order' => 2)
),
array(
'Action'=> array('id' => 8,'name' => 'Modulos : Eliminar','url' => '/admin/modules/delete','category_id' => 2,'order' => 3)
),

array(
'Action'=> array('id' => 9,'name' => 'Categorias : Listado','url' => '/admin/categories/index','category_id' => 3,'order' => 0)
),
array(
'Action'=> array('id' => 10,'name' => 'Categorias : Agregar','url' => '/admin/categories/add','category_id' => 3,'order' => 1)
),
array(
'Action'=> array('id' => 11,'name' => 'Categorias : Editar','url' => '/admin/categories/edit','category_id' => 3,'order' => 2)
),
array(
'Action'=> array('id' => 12,'name' => 'Categorias : Eliminar','url' => '/admin/categories/delete','category_id' => 3,'order' => 3)
),

array(
'Action'=> array('id' => 13,'name' => 'Funciones : Listado','url' => '/admin/actions/index','category_id' => 4,'order' => 0)
),
array(
'Action'=> array('id' => 14,'name' => 'Funciones : Agregar','url' => '/admin/actions/add','category_id' => 4,'order' => 1)
),
array(
'Action'=> array('id' => 15,'name' => 'Funciones : Editar','url' => '/admin/actions/edit','category_id' => 4,'order' => 2)
),
array(
'Action'=> array('id' => 16,'name' => 'Funciones : Eliminar','url' => '/admin/actions/delete','category_id' => 4,'order' => 3)
),

array(
'Action'=> array('id' => 17,'name' => 'Permisos : Listado','url' => '/admin/groupactions/index','category_id' => 5,'order' => 0)
),
array(
'Action'=> array('id' => 18,'name' => 'Permisos : Agregar','url' => '/admin/groupactions/add','category_id' => 5,'order' => 1)
),
array(
'Action'=> array('id' => 19,'name' => 'Permisos : Eliminar','url' => '/admin/groupactions/delete','category_id' => 5,'order' => 3)
),
array(
'Action'=> array('id' => 20,'name' => 'Permisos : ACL','url' => '/admin/groupactions/acl','category_id' => 5,'order' => 4)
),

array(
'Action'=> array('id' => 21,'name' => 'Usuarios : Listado','url' => '/admin/users/index','category_id' => 6,'order' => 0)
),
array(
'Action'=> array('id' => 22,'name' => 'Usuarios : Agregar','url' => '/admin/users/add','category_id' => 6,'order' => 1)
),
array(
'Action'=> array('id' => 23,'name' => 'Usuarios : Editar','url' => '/admin/users/edit','category_id' => 6,'order' => 2)
),
array(
'Action'=> array('id' => 24,'name' => 'Usuarios : Eliminar','url' => '/admin/users/delete','category_id' => 6,'order' => 3)
),
array(
'Action'=> array('id' => 25,'name' => 'Usuarios : Sync','url' => '/admin/users/initDB','category_id' => 6,'order' => 4)
),

);  

            
        $data_groupactions=array(); 
        $id_groupactions = 1;
        $groupaction = array();
        foreach ($data_actions as $keyaction => $action) {
            
            $groupaction = array('Groupaction'=> array('id' => $id_groupactions,'group_id' => 1,'action_id' => $action['Action']['id']));
            array_push($data_groupactions, $groupaction);
            $id_groupactions ++;
        }
            


        if($this->Module->saveMany($data_modules)){


            $this->_flash(__('Instalación: Modulos Creados',true),'alert alert-success');

            if($this->Category->saveMany($data_categories)){

                $this->_flash(__('Instalación: Categorias Creadas',true),'alert alert-success');

                if($this->Action->saveMany($data_actions)){
                     
                     $this->_flash(__('Instalación: Funciones Creadas',true),'alert alert-success');

                     if($this->Groupaction->saveMany($data_groupactions)){
                          $this->_flash(__('Instalación: Permisos Creados',true),'alert alert-success');
                     }

                }

            }

        }


    }

    public function install_acl($cont_modules, $cont_group,$cont_users){

        //pr($this->params);
        
        $redirect = 1;

        if($cont_group == 0){

            if($this->params["controller"] == "groups"){
                $this->Auth->allow('admin_add');
                if($this->params["action"] == "admin_add"){
                    $redirect =0;
                }

            }

            if($redirect){
                $this->redirect(array('controller' => 'groups','action' => 'admin_add'));
            }
            
        }else{

            if($cont_users == 0){
                if($this->params["controller"] == "users"){
                    $this->Auth->allow('admin_add');

                    if($this->params["action"] == "admin_add"){
                        $redirect =0;
                    }
                    
                    if($redirect){
                        $this->redirect(array('controller' => 'users','action' => 'admin_add'));
                    }

                }else{
                    if($this->params["controller"] == "groups"){
                        $this->redirect(array('controller' => 'users','action' => 'admin_add'));
                    }
                }
                
            }else{

                if($cont_users == 1){

                    if($cont_modules == 0){
                        $this->installBase();
                    }

                    $this->syncACL();

                    if($this->params["controller"] == "users"){
                        if(($this->params["action"] != "admin_login")||($this->params["action"] != "admin_logout")){
                          $redirect =0;
                          if($redirect){
                            $this->redirect(array('controller' => 'users','action' => 'admin_logout'));
                          }

                        }
                    }
                }

            }

        }

    }

    public function setSidebarMenu($category_id=null){


        $actions = $this->Session->read('User.actions');
        //pr($actions);

        $actions_category = array();
        $actions_category = $this->Session->read('User.actions_category');

        $action['Action'] = array('name'=>'Inicio','url'=>'/admin/users/home/');
        $actions_category[0]=$action['Action'];

        if(isset($category_id)){

            $actions_category = array();

            $action['Action'] = array('name'=>'Inicio','url'=>'/admin/users/home/');
            $actions_category[0]=$action['Action'];

            $this->Category->id = $category_id;
            if (!$this->Category->exists()) {
                $this->_flash(__('msg-categorys-edit-noexist',true),'alert alert-warning');
                $this->redirect(array('action' => 'admin_home'));
            }else{

                foreach ($actions as $keyaction => $action) {
                    if($action['Action']['category_id'] == $category_id){
                        $actions_category[$action['Action']['id']] = $action['Action'];
                    }
                }

            }
            $this->Session->write('User.actions_category', $actions_category);
        }

        //pr($actions_category);
        $this->set('actions_category',$actions_category);
        $controladoractual = $this->params['controller'];        
        $funcionactual = $this->params['action'];
        $parametrosactuales = $this->params['pass'];
        $this->set(compact('controladoractual','funcionactual','parametrosactuales'));

    }


    public function setHeaderMenu(){

        $header_menu = $this->Session->read('User.header_menu');

        if(empty($header_menu)){

            $group_id = $this->Auth->user('group_id');
            
            $groupactions = $this->Groupaction->find("list",array(
                'fields'=>array('Groupaction.action_id'),
                'conditions'=>array(
                    'Groupaction.group_id' => $group_id
                ) ,
                'recursive' => -1  
            ));

            //pr($groupactions);

            if(!empty($groupactions)){

                $actions = $this->Action->find("all",array(
                    'fields' => array('Action.id','Action.name','Action.url','Action.category_id'),
                    'conditions'=>array(
                        'Action.id' => $groupactions
                    ),
                    'order'=>'Action.order ASC',
                    'recursive'=>-1
                ));

                //pr($actions);

                $categories_actions = $this->Action->find("list",array(
                    'fields' => array('Action.category_id'),
                    'conditions'=>array(
                        'Action.id' => $groupactions
                    ),
                    'group' => 'Action.category_id',
                    'order'=>'Action.order ASC',
                    'recursive'=>-1
                ));

                //pr($categories_actions);

                $categories = $this->Category->find("all",array(
                    'fields' => array('Category.id',"Category.name",'Category.module_id'),
                    'conditions'=>array(
                        'Category.id' => $categories_actions
                    ),
                    'order'=>'Category.order ASC',
                    'recursive'=>-1
                ));

                //pr($categories);


                $modules_categories = $this->Category->find("list",array(
                    'fields' => array('Category.module_id'),
                    'conditions'=>array(
                        'Category.id' => $categories_actions
                    ),
                    'group' => 'Category.module_id',
                    'order'=>'Category.order ASC',
                    'recursive'=>-1
                ));

                //pr($modules_categories);


                $modules = $this->Module->find("list",array(
                    'fields' => array('Module.id',"Module.name"),
                    'conditions'=>array(
                        'Module.id' => $modules_categories
                    ),
                    'order'=>'Module.order ASC',
                    'recursive'=>-1
                ));

                //pr($modules);


                $header_menu = array();
                
                foreach ($modules as $keymod => $module) {
                    
                    $module = array(
                        'name' => $module,
                        'categories' => array()
                    );

                    foreach ($categories as $keycat => $category) {
                        array_push($module["categories"], $category["Category"]);
                    }

                    $header_menu["modules"][$keymod]= $module;

                }
                //pr($header_menu);

                $this->Session->write('User.actions', $actions);
                $this->Session->write('User.header_menu', $header_menu);
            }
        }
        
        $this->set('header_menu',$header_menu);

    }

    public function is_Authorizate(){

        
        if($this->Auth->user('id')){
            $this->setHeaderMenu();
            $this->setSidebarMenu();
        }


        $result = $this->Group->query("SELECT count(*) as contador FROM aros_acos;");
        $cantidad_array= $result[0][0];

        if($cantidad_array["contador"] == 0){

            $cont_modules = $this->Module->find("count",array("recursive"=>-1));
            
            $cont_group = $this->Group->find("count",array(
            "recursive" => "-1"
            ));
            $cont_users = $this->User->find("count",array(
                "recursive" => "-1"
            ));

            if(($cont_group == 0) || ($cont_group == 1) || ($cont_users == 0)){
                $this->install_acl($cont_modules,$cont_group, $cont_users);
            }
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