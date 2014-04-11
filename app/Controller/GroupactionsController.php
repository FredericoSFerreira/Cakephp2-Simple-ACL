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


}
