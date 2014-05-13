<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class ViewbaseHelper extends AppHelper {

	public $action = '';
	public $actionmultipleselect = array();
	public $actionlocate = array();

	public function set($vars,$value){
		$this->{$vars} = $value;
	}

	public function table_Header($paginator, $titles){
		
		echo "<thead>
            <tr>";

		// Campo check para seleccionar todos desde arriba
        $this->Multi_checkall_up_create($this->actionmultipleselect);

		foreach ($titles as $field => $title) {
			echo "<th>".$paginator->sort($field,$title)."</th>";
		}

		// Encabezado de si tiene acciones
        $this->Actions_headers($this->actionlocate);


        echo "</tr>
            </thead>";
		
	}

	public function panel_title($title){

		$panel_title = "
		<div class=\"panel-heading\">
	        <strong>
	            <span class=\"glyphicon glyphicon-th\"></span>
	            ".__($title)."
	        </strong>
	    </div>
		";

		echo $panel_title;

	}

	public function Multi_form_create($form,$target){
		if(in_array($this->action, $this->actionmultipleselect)){ 
            echo $form->create('Action', array('action' => $target,'type' => 'post'));
        }
	}

	public function Multi_checkall_up_create(){
		if(in_array($this->action, $this->actionmultipleselect)){    
            echo "<th><input type=\"checkbox\" class=\"checkallclick\" title=\"Check All\"></th>";
        } 
	}

	public function Multi_check_row($datarow){

		
		 
        if(in_array($this->action, $this->actionmultipleselect)){ 
        
	        echo "<td style=\"width: 10px;\">
	            <input type=\"checkbox\" class=\"actionsdelete-check\" 
	                   multitext=\"#".$datarow['idModel']." - ".$datarow['textname']."\" 
	                   name=\"".$datarow['inputname']."\" 
	                   value=\"".$datarow['value']."\"/> 
	        	</td>";
        } 

	}

	public function Actions_headers(){
    
        if(in_array($this->action, $this->actionlocate)){ 
        
	        echo "<th class=\"actions\" align=\"center\">
	        		<div align=\"center\">".__('Acciones')."</div>
	        	  </th>";
         }
	}

	public function button_edit($html,$data){

		 echo $html->link('<span class="glyphicon glyphicon-pencil"></span> '.__('Editar'), $data['url'], array('class' => 'btn btn-warning', 'escape' => false)); 

	}

	public function button_delete($html,$data){

		 echo $html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', $data['url'], array('class' => 'btn btn-warning deleteitem','data-confirm-title'=>__("Confirmación para eliminar"),'data-confirm-msg'=>__("Deseas eliminar el registro #").$data['idModel']." ?", 'escape' => false)); 

	}
}
