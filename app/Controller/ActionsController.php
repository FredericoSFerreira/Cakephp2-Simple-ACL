<?php
App::uses('AppController', 'Controller');
/**
 * Actions Controller
 *
 * @property Action $Action
 */
class ActionsController extends AppController {

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

            $this->set(
                    array(
                        "categories" => $this->Category->find("list")
                    )
            );

            $fields_char = array(
                        'name','url'
            );


            $conditions = $this->filterConfig('Action',$fields_char);
            $this->recordsforpage();

            return $conditions;

        }

    /*----------------INDEX-----------------*/

        /*----------------get_index-----------------*/
        public function get_index($urlfilter = 'admin_index'){

            $conditions = $this->paramFilters($urlfilter);

            $this->Action->setLanguage();
            //pr($conditions);
            $limit = $this->Session->read('Filter.recordsforpage');

            $this->Paginator->settings = array(
                'order' => 'Action.id ASC',
                'conditions' => $conditions,
                'limit' => $limit
            );
            $lists = $this->Paginator->paginate('Action');
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


                $fieldslocales = array('Action'=>array('name'));
                $validations= $this->validationLocale($fieldslocales);

                if(empty($validations)){

                    $this->Group->create();
                    $this->Group->set($this->data);
                    try{
                        if ($this->Action->saveMany()) {
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

        /*----------------get_add-----------------*/
        public function get_add(){
                $this->set(
                	array(
                		"categories" => $this->Category->find("list")
                	)
                );
        }
        /*----------------get_add-----------------*/

        /*----------------add-----------------*/
        public function admin_add() {
            $form_config = array();
            $form_config["title"] = "Agregar Función";
            $form_config["urlform"] = "admin_add";
            $form_config["labelbutton"] = "Agregar";
            $this->set('form_config',$form_config);

            if ($this->request->is('post')) {
                $this->post_add();
            }else{

            	if ($this->request->is('get')) {
            		$this->get_add();
            	}
            }
        }
        /*----------------add-----------------*/

    /*----------------ADD-----------------*/


    /*----------------EDIT-----------------*/

        /*----------------get_edit-----------------*/
        public function get_edit($id){

            $this->Action->id = $id;
            if (!$this->Action->exists()) {
                $this->_flash(__('No-exist-record',true),'alert alert-warning');
                $this->redirect(array('action' => 'admin_edit'));
            }else{

            	$this->set(
                	array(
                		"categories" => $this->Category->find("list")
                	)
                );

                $datamodel = $this->Action->read(null, $id);
                $this->request->data = $this->readWithLocale($datamodel);

                $this->set(compact('id'));
            }

        }
        /*----------------get_edit-----------------*/

        /*----------------post_edit-----------------*/
        public function post_edit($id){

                $this->ajaxVariablesInit();

                $fieldslocales = array('Action'=>array('name'));
                $validations = $this->validationLocale($fieldslocales);

                if(empty($validations)){
                    $this->Action->id = $id;
                    $this->Action->set($this->data);
                    try{
                        if ($this->Action->saveMany()) {
                            $this->_flash(__('Update-success',true),'alert alert-success');
                            $this->dataajax['response']['redirect']='/admin/actions/edit/';
                        }
                    }catch (Exception $e) {
                        $this->dataajax['response']['message_error']=__('Update-error',true);
                    }

                }else{
                     $this->dataajax['response']["errors"]=$validations;
                }
                echo json_encode($this->dataajax);;
        }
        /*----------------post_edit-----------------*/

        /*----------------edit-----------------*/
        public function admin_edit($id=null){

            if($this->request->is('ajax')){
                $this->layout = 'ajax';
            }
            
            $form_config = array();
            $form_config["title"] = "Editar Función";
            $form_config["urlform"] = "admin_edit";
            $form_config["labelbutton"] = "Guardar";            
           

            if ($this->request->is('get')) {
                if(empty($id)){
                    $this->get_index('admin_edit');
                }else{
                     $this->set('form_config',$form_config);
                    $this->get_edit($id);
                }
            }else{
                if ($this->request->is('post')) {
                    $this->set('form_config',$form_config);
                    $this->post_edit($id);
                }
            }

        }
        /*----------------edit-----------------*/

    /*----------------EDIT-----------------*/

    /*----------------DELETE-----------------*/


        /*----------------delete-----------------*/
        public function admin_deletemulti(){

            if($this->request->is('post')){
                //pr($this->data);
                $dataids =  $this->data['Action']['id'];

                try{
                    if ($this->Action->deleteAll(array('Action.id' => $dataids))) {
                        $this->_flash(__('Delete-success-multi',true),'alert alert-success');
                        $this->redirect(array('action' => 'admin_delete'));
                    }
                }catch (Exception $e) {
                    $this->_flash(__('Delete-error-multi', true),'alert alert-warning');
                    $this->redirect(array('action' => 'admin_delete'));
                }
            }else{
                $this->_flash(__('Delete-error-multi-request', true),'alert alert-danger');
                $this->redirect(array('action' => 'admin_delete'));
            }

        }
        /*----------------delete-----------------*/



        /*----------------delete-----------------*/
        public function admin_delete($id=null){

            if($this->request->is('ajax')){
                $this->layout = 'ajax';
            }

            if(!empty($id)){
                $this->Action->id = $id;
                if (!$this->Action->exists()) {
                    $this->_flash(__('No-exist-record', true),'alert alert-warning');
                    $this->redirect(array('action' => 'admin_delete'));
                }   

                try{
                    if ($this->Action->delete($id,true)) {
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

}
