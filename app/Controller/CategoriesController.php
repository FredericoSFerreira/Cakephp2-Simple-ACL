<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
 
class CategoriesController extends AppController {

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


            $conditions = $this->filterConfig('Category',$fields_char);
            $this->recordsforpage();

            return $conditions;

        }

    /*----------------INDEX-----------------*/

        /*----------------get_index-----------------*/
        public function get_index($urlfilter = 'admin_index'){
            $conditions=$this->paramFilters($urlfilter);
            $limit = $this->Session->read('Filter.recordsforpage');

            $this->Category->setLanguage();
            $this->Paginator->settings = array(
                'order' => 'Category.id ASC',
                'conditions' => $conditions,
                'limit' => $limit,
                'recursive' => 1
            );
             $this->set(
                    array(
                        "modules" => $this->Module->find("list")
                    )
                );
            $lists = $this->Paginator->paginate('Category');
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

                
                $fieldslocales = array('Category'=>array('name'));
                $validations = $this->validationLocale($fieldslocales);

                if(empty($validations)){
                $this->Category->create();
                $this->Category->set($this->data);
                    try{
                        if ($this->Category->saveMany()) {
                            $this->dataajax['response']['message_success']=__('Save-success',true);
                        }
                    }catch (Exception $e) {
                        $this->dataajax['response']['message_error']=__('Save-success',true);
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
                		"modules" => $this->Module->find("list")
                	)
                );
        }
        /*----------------get_add-----------------*/

        /*----------------add-----------------*/
        public function admin_add() {
            $form_config = array();
            $form_config["title"] = "Agregar Categoria";
            $form_config["urlform"] = "admin_add";
            $form_config["labelbutton"] = "Agregar";
            $this->set('form_config',$form_config);

            if ($this->request->is('post')) {
                $this->post_add();
            }elseif ($this->request->is('get')){
                $this->get_add();
            }

        }
        /*----------------add-----------------*/

    /*----------------ADD-----------------*/



    /*----------------EDIT-----------------*/

        /*----------------get_edit-----------------*/
        public function get_edit($id){

            $this->Category->id = $id;
            if (!$this->Category->exists()) {
                $this->_flash(__('No-exist-record',true),'alert alert-warning');
                $this->redirect(array('action' => 'admin_edit'));
            }else{

            	$this->set(
                	array(
                		"modules" => $this->Module->find("list")
                	)
                );

                $datamodel = $this->Category->read(null, $id);
                $this->request->data = $this->readWithLocale($datamodel); // se trae la informacion al editar. 
                $this->set(compact('id'));
            }

        }
        /*----------------get_edit-----------------*/

        /*----------------post_edit-----------------*/
        public function post_edit($id){

                $this->ajaxVariablesInit();
                $fieldslocales = array('Category'=>array('name'));
                $validations = $this->validationLocale($fieldslocales);

                if(empty($validations)){
                $this->Category->id = $id;
                $this->Category->set($this->data);
               
                    try{
                        if ($this->Category->saveMany()) {
                            $this->_flash(__('Update-success',true),'alert alert-success');
                            $this->dataajax['response']['redirect']='/admin/categories/edit/';
                        }
                    }catch (Exception $e) {
                        $this->dataajax['response']['message_error']=__('Update-error',true);
                    }
                }else{
                     $this->dataajax['response']["errors"]=$validations;
                }
                echo json_encode($this->dataajax);
        }
        /*----------------post_edit-----------------*/

        /*----------------edit-----------------*/
        public function admin_edit($id=null){

            $form_config = array();
            $form_config["title"] = "Editar Categoria";
            $form_config["urlform"] = "admin_edit";
            $form_config["labelbutton"] = "Guardar";            
            $this->set('form_config',$form_config);

           

            if ($this->request->is('get')) {
                if(empty($id)){
                    $this->get_index('admin_edit');
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

            if($this->request->is('ajax')){
                $this->layout = 'ajax';
            }

            if(!empty($id)){
                $this->Category->id = $id;
                if (!$this->Category->exists()) {
                    $this->_flash(__('No-exist-record', true),'alert alert-danger');
                    $this->redirect(array('action' => 'admin_delete'));
                }   

                try{
                    if ($this->Category->delete($id,true)) {
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

        /*----------------delete-----------------*/
        public function admin_deletemulti(){

            if($this->request->is('post')){
                //pr($this->data);
                $dataids =  $this->data['Category']['id'];

                try{
                    if ($this->Category->deleteAll(array('Category.id' => $dataids))) {
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

    /*----------------DELETE-----------------*/

}
