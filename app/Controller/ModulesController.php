<?php
App::uses('AppController', 'Controller');
/**
 * Modules Controller
 *
 * @property Module $Module
 */
class ModulesController extends AppController {

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

            $fields_char = array(
                        'name'
            );


            $conditions = $this->filterConfig('Module',$fields_char);
            $this->recordsforpage();

            return $conditions;

        }

    /*----------------INDEX-----------------*/

        /*----------------get_index-----------------*/
        public function get_index($urlfilter = 'admin_index'){
            $conditions = $this->paramFilters($urlfilter);

            //pr($conditions);
            $limit = $this->Session->read('Filter.recordsforpage');

            $this->Module->setLanguage();
            $this->Paginator->settings = array(
                'order' => 'Module.id ASC',
                'conditions' => $conditions,
                'limit' => $limit
            );
            
            $lists = $this->Paginator->paginate('Module');
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
                
                $fieldslocales = array('Module'=>array('name'));
                $validations = $this->validationLocale($fieldslocales);

                if(empty($validations)){
                    $this->Module->create();
                    $this->Module->set($this->data);
                        try{
                            if ($this->Module->saveMany()) {
                                $this->dataajax['response']['message_success']=__('Save-success',true);
                            }
                        }catch (Exception $e) {
                            $this->dataajax['response']['message_error']=__('Save-error',true);
                        }
                }else{
                    $this->dataajax['response']["errors"]=$validations;
                }


                echo json_encode($this->dataajax);
        }
        /*----------------post_add-----------------*/

        /*----------------add-----------------*/
        public function admin_add() {

            $form_config = array();
            $form_config["title"] = "Agregar Modulo";
            $form_config["urlform"] = "admin_add";
            $form_config["labelbutton"] = "Agregar";
            $this->set('form_config',$form_config);

            if ($this->request->is('post')) {
                $this->post_add();
            }
        }
        /*----------------add-----------------*/

    /*----------------ADD-----------------*/


    /*----------------EDIT-----------------*/

        /*----------------get_edit-----------------*/
        public function get_edit($id){

            $this->Module->id = $id;
            if (!$this->Module->exists()) {
                $this->_flash(__('No-exist-record',true),'alert alert-warning');
                $this->redirect(array('action' => 'admin_edit'));
            }else{
                $this->request->data = $this->Module->read(null, $id);
                $this->set(compact('id'));
            }

        }
        /*----------------get_edit-----------------*/

        /*----------------post_edit-----------------*/
        public function post_edit($id){
                $this->ajaxVariablesInit();
                $this->Module->id = $id;
                $this->Module->set($this->data);
                if($this->Module->validates())
                {
                    try{
                        if ($this->Module->save()) {
                            $this->_flash(__('Update-success',true),'alert alert-success');
                            $this->dataajax['response']['redirect']='/admin/modules/edit/';
                        }
                    }catch (Exception $e) {
                        $this->dataajax['response']['message_error']=__('Update-error',true);
                    }

                }else{
                     $this->errorsajax['Module'] = $this->Module->validationErrors;
                     $this->dataajax['response']["errors"]= $this->errorsajax;
                }
                echo json_encode($this->dataajax);
        }
        /*----------------post_edit-----------------*/

        /*----------------edit-----------------*/
        public function admin_edit($id=null){

            $form_config = array();
            $form_config["title"] = "Editar Modulo";
            $form_config["urlform"] = "admin_edit";
            $form_config["labelbutton"] = "Guardar";            
            $this->set('form_config',$form_config);

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
                $this->Module->id = $id;
                if (!$this->Module->exists()) {
                    $this->_flash(__('No-exist-record', true),'alert alert-danger');
                    $this->redirect(array('action' => 'admin_delete'));
                }   

                try{
                    if ($this->Module->delete($id,true)) {
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
