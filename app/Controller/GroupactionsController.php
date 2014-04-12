<?php
App::uses('AppController', 'Controller');
/**
 * Groupactions Controller
 *
 * @property Groupaction $Groupaction
 */
class GroupactionsController extends AppController {


	/*----------------beforeFilter-----------------*/
    public function beforeFilter() {
        parent::beforeFilter();
    }
    /*----------------beforeFilter-----------------*/
    

    /*----------------INDEX-----------------*/

        /*----------------get_index-----------------*/
        public function get_index(){
            $this->Groupaction->paginate = array(
                'order' => 'Groupaction.id ASC',
                'limit' => 10
            );
            $lists = $this->paginate('Groupaction');
            $this->set(compact('lists'));
        }
        /*----------------get_index-----------------*/

        /*----------------index-----------------*/
        public function index(){

            if ($this->request->is('get')) {
                $this->get_index();
            }
        }
        /*----------------index-----------------*/

    /*----------------INDEX-----------------*/


    /*----------------ADD-----------------*/

        /*----------------post_add-----------------*/
        public function post_add(){
                $this->Groupaction->create();
                $this->Groupaction->set($this->data);
                if($this->Groupaction->validates())
                {
                    if ($this->Groupaction->save()) {
                        $this->_flash(__('msg-groups-save',true),'alert alert-warning');
                        $this->redirect(array('action' => 'add'));
                    }
                }
        }
        /*----------------post_add-----------------*/

        /*----------------add-----------------*/
        public function add() {
            
        	$this->set(
                	array(
                		"groups" => $this->Group->find("list"),
                		"actions" => $this->Action->find("list")
                	)
            );

            if ($this->request->is('post')) {
                $this->post_add();
            }
        }
        /*----------------add-----------------*/

    /*----------------ADD-----------------*/

    /*----------------DELETE-----------------*/

        /*----------------delete-----------------*/
        public function delete($id=null){

            if(!empty($id)){
                $this->Groupaction->id = $id;
                if (!$this->Groupaction->exists()) {
                    $this->_flash(__('Debe seleccionar un item a eliminar', true),'alert alert-danger');
                    $this->redirect(array('action' => 'delete'));
                }   

                if ($this->Groupaction->delete($id,true)) {
                    $this->_flash(__('Registro borrado de forma exitosa', true),'alert alert-success');
                    $this->redirect(array('action' => 'delete'));
                }
            }else{
                $this->get_index();
            }

        }
        /*----------------delete-----------------*/

    /*----------------DELETE-----------------*/


    /*----------------ACL-----------------*/
    public function acl($access = null , $aro = null, $aco = null, $id =null){
        
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
                $this->_flash(__('msg-acl-save',true),'alert alert-success');
                $this->redirect(array('action' => 'acladmin'));
            } else {
                $this->_flash(__('msg-acl-error',true),'alert alert-warning');
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
     /*----------------ACL-----------------*/


}
