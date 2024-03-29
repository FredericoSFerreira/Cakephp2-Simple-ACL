<?php
App::uses('AppController', 'Controller');
/**
 * Groupactions Controller
 *
 * @property Groupaction $Groupaction
 */
class GroupactionsController extends AppController {

    public $components = array('Security');

	/*----------------beforeFilter-----------------*/
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->csrfExpires = '+1 hour';
        $this->Security->csrfUseOnce = false;
        $this->Security->unlockedActions = array('admin_deletemulti');
    }
    /*----------------beforeFilter-----------------*/
    
    public function paramFilters($urlform){

            $form_config = array();
            $form_config["title"] = "Buscar / Filtrar";
            $form_config["urlform"] = $urlform;
            $form_config["labelbutton"] = "Buscar / Filtrar";
            $this->set('form_config',$form_config);

            $fields_char = array();

            $conditions = $this->filterConfig('Groupaction',$fields_char);
            $this->recordsforpage();

            return $conditions;

        }


    /*----------------INDEX-----------------*/

        /*----------------get_index-----------------*/
        public function get_index($urlfilter = 'admin_index'){
            $conditions = $this->paramFilters($urlfilter);

            //pr($conditions);
            $limit = $this->Session->read('Filter.recordsforpage');

            $this->Paginator->settings = array(
                'conditions' => $conditions,
                'order' => 'Groupaction.id ASC',
                'limit' => $limit
            );

            $this->set(
                    array(
                        "groups" => $this->Group->find("list"),
                        "actions" => $this->Action->find("list")
                    )
            );

            $lists = $this->Paginator->paginate('Groupaction');
            $this->set(compact('lists'));
        }
        /*----------------get_index-----------------*/

        /*----------------index-----------------*/
        public function admin_index(){

            if($this->request->is('ajax')){
                $this->layout = 'ajax';
            }

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

                $this->Groupaction->create();
                $this->Groupaction->set($this->data);
                if($this->Groupaction->validates())
                {
                    try{
                        if ($this->Groupaction->save()) {
                            $this->dataajax['response']['message_success']=__('Save-success',true);
                        }
                    }catch (Exception $e) {
                        $this->dataajax['response']['message_error']=__('Save-error',true);
                    }
                    
                }else{
                     $this->errorsajax['Groupaction'] = $this->Groupaction->validationErrors;
                     $this->dataajax['response']["errors"]= $this->errorsajax;
                }
                
                echo json_encode($this->dataajax);
        }
        /*----------------post_add-----------------*/

        /*----------------add-----------------*/
        public function admin_add() {
            $form_config = array();
            $form_config["title"] = "Agregar Grupo";
            $form_config["urlform"] = "admin_add";
            $form_config["labelbutton"] = "Agregar";
            $this->set('form_config',$form_config);
            
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
        public function admin_delete($id=null){

            if($this->request->is('ajax')){
                $this->layout = 'ajax';
            }

            if(!empty($id)){
                $this->Groupaction->id = $id;
                if (!$this->Groupaction->exists()) {
                    $this->_flash(__('No-exist-record', true),'alert alert-danger');
                    $this->redirect(array('action' => 'admin_delete'));
                }   

                try{
                    if ($this->Groupaction->delete($id,true)) {
                        $this->_flash(__('Delete-success', true),'alert alert-success');
                        $this->redirect(array('action' => 'admin_delete'));
                    }
                }catch (Exception $e) {
                        $this->_flash(__('Delete-error', true),'alert alert-warning');
                        $this->redirect(array('action' => 'admin_delete'));
                }

            }else{
                $this->get_index('admin_delete');
            }

        }
        /*----------------delete-----------------*/

    /*----------------DELETE-----------------*/


    /*----------------ACL-----------------*/
    public function admin_acl($access = null , $aro = null, $aco = null, $id =null){
        
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
                $this->_flash(__('Save-success',true),'alert alert-success');
                $this->redirect(array('action' => 'admin_acladmin'));
            } else {
                $this->_flash(__('Save-error',true),'alert alert-warning');
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
