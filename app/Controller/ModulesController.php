<?php
App::uses('AppController', 'Controller');
/**
 * Modules Controller
 *
 * @property Module $Module
 */
class ModulesController extends AppController {


	/*----------------beforeFilter-----------------*/
    public function beforeFilter() {
        parent::beforeFilter();
    }
    /*----------------beforeFilter-----------------*/

    /*----------------INDEX-----------------*/

        /*----------------get_index-----------------*/
        public function get_index(){
            $this->Module->paginate = array(
                'order' => 'Module.id ASC',
                'limit' => 10
            );
            $lists = $this->paginate('Module');
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
                $this->Module->create();
                $this->Module->set($this->data);
                if($this->Module->validates())
                {
                    if ($this->Module->save()) {
                        $this->_flash(__('msg-modules-save',true),'alert alert-warning');
                        $this->redirect(array('action' => 'add'));
                    }
                }
        }
        /*----------------post_add-----------------*/

        /*----------------add-----------------*/
        public function add() {
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
                $this->_flash(__('msg-modules-edit-noexist',true),'alert alert-warning');
                $this->redirect(array('action' => 'edit'));
            }else{
                $this->request->data = $this->Module->read(null, $id);
                $this->set(compact('id'));
            }

        }
        /*----------------get_edit-----------------*/

        /*----------------post_edit-----------------*/
        public function post_edit($id){

                $this->Module->set($this->data);
                if($this->Module->validates())
                {
                    if ($this->Module->save()) {
                        $this->_flash(__('msg-modules-update',true),'alert alert-warning');
                        $this->redirect(array('action' => 'edit'));
                    }
                }
                $this->set(compact('id'));
        }
        /*----------------post_edit-----------------*/

        /*----------------edit-----------------*/
        public function edit($id=null){

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
        public function delete($id=null){

            if(!empty($id)){
                $this->Module->id = $id;
                if (!$this->Module->exists()) {
                    $this->_flash(__('Debe seleccionar un item a eliminar', true),'alert alert-danger');
                    $this->redirect(array('action' => 'delete'));
                }   

                if ($this->Module->delete($id,true)) {
                    $this->_flash(__('Registro borrado de forma exitosa', true),'alert alert-success');
                    $this->redirect(array('action' => 'delete'));
                }
            }else{
                $this->get_index();
            }

        }
        /*----------------delete-----------------*/

    /*----------------DELETE-----------------*/

}
