<?php
App::uses('AppController', 'Controller');
/**
 * Actions Controller
 *
 * @property Action $Action
 */
class ActionsController extends AppController {


	/*----------------beforeFilter-----------------*/
    public function beforeFilter() {
        parent::beforeFilter();
    }
    /*----------------beforeFilter-----------------*/
    

    /*----------------INDEX-----------------*/

        /*----------------get_index-----------------*/
        public function get_index(){
            $this->Action->paginate = array(
                'order' => 'Action.id ASC',
                'limit' => 10
            );
            $lists = $this->paginate('Action');
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
                $this->Action->create();
                $this->Action->set($this->data);
                if($this->Action->validates())
                {
                    if ($this->Action->save()) {
                        $this->_flash(__('msg-actions-save',true),'alert alert-warning');
                        $this->redirect(array('action' => 'add'));
                    }
                }else{
                	$this->get_add();
                }
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
        public function add() {
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
                $this->_flash(__('msg-Actions-edit-noexist',true),'alert alert-warning');
                $this->redirect(array('action' => 'edit'));
            }else{

            	$this->set(
                	array(
                		"categories" => $this->Category->find("list")
                	)
                );

                $this->request->data = $this->Action->read(null, $id);
                $this->set(compact('id'));
            }

        }
        /*----------------get_edit-----------------*/

        /*----------------post_edit-----------------*/
        public function post_edit($id){

                $this->Action->set($this->data);
                if($this->Action->validates())
                {
                    if ($this->Action->save()) {
                        $this->_flash(__('msg-modules-update',true),'alert alert-warning');
                        $this->redirect(array('action' => 'edit'));
                    }
                }else{

                	$this->set(
                	array(
                		"categories" => $this->Category->find("list")
                	)
                	);

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
                $this->Action->id = $id;
                if (!$this->Action->exists()) {
                    $this->_flash(__('Debe seleccionar un item a eliminar', true),'alert alert-danger');
                    $this->redirect(array('action' => 'delete'));
                }   

                if ($this->Action->delete($id,true)) {
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
