<?php
App::uses('AppController', 'Controller');

class GroupsController extends AppController {
    
    /*----------------beforeFilter-----------------*/
    public function beforeFilter() {
        parent::beforeFilter();
    }
    /*----------------beforeFilter-----------------*/
    

    /*----------------INDEX-----------------*/

        /*----------------get_index-----------------*/
        public function get_index(){
            $this->Paginator->settings = array(
                'order' => 'Group.id ASC',
                'limit' => 10
            );
            $lists = $this->Paginator->paginate('Group');
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


    /*----------------DELETE-----------------*/

        /*----------------delete-----------------*/
        public function admin_delete($id=null){

            if(!empty($id)){
                $this->Group->id = $id;
                if (!$this->Group->exists()) {
                    $this->_flash(__('No-exist-record', true),'alert alert-danger');
                    $this->redirect(array('action' => 'admin_delete'));
                }   

                try{
                    if ($this->Group->delete($id,true)) {
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


    /*----------------EDIT-----------------*/

        /*----------------get_edit-----------------*/
        public function get_edit($id){

            $this->Group->id = $id;
            if (!$this->Group->exists()) {
                $this->_flash(__('No-exist-record',true),'alert alert-warning');
                $this->redirect(array('action' => 'admin_edit'));
            }else{
                $this->request->data = $this->Group->read(null, $id);
                $this->set(compact('id'));
            }

        }
        /*----------------get_edit-----------------*/

        /*----------------post_edit-----------------*/
        public function post_edit($id){

                $this->ajaxVariablesInit();
                $this->Group->id = $id;
                $this->Group->set($this->data);
                if($this->Group->validates())
                {
                    try{
                        if ($this->Group->save()) {
                            $this->_flash(__('Update-success',true),'alert alert-success');
                            $this->dataajax['response']['redirect']='/admin/groups/edit/';
                        }
                    }catch (Exception $e) {
                        $this->dataajax['response']['message_error']=__('Update-error',true);
                    }
                }
                else{
                     $this->errorsajax['Group'] = $this->Group->validationErrors;
                     $this->dataajax['response']["errors"]= $this->errorsajax;
                }
                echo json_encode($this->dataajax);
        }
        /*----------------post_edit-----------------*/

        /*----------------edit-----------------*/
        public function admin_edit($id=null){

            $form_config = array();
            $form_config["title"] = "Editar Grupo";
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

    /*----------------ADD-----------------*/

        /*----------------post_add-----------------*/
        public function post_add(){

                $this->ajaxVariablesInit();

                $this->Group->create();
                $this->Group->set($this->data);
                if($this->Group->validates())
                {
                    try{
                        if ($this->Group->save()) {
                            $this->dataajax['response']['message_success']=__('Save-success',true);
                        }
                    }catch (Exception $e) {
                        $this->dataajax['response']['message_error']=__('Save-error',true);
                    }
                }else{
                     $this->errorsajax['Group'] = $this->Group->validationErrors;
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

            if ($this->request->is('post')) {
                $this->post_add();
            }
        }
        /*----------------add-----------------*/

    /*----------------ADD-----------------*/

}
