<?php 
echo $this->Form->create('Groupaction', array('action' => 'add'));
?>
<div class="form-group">
<h3 class="page-header">Asignar nueva función a grupo</h3>

<?php
echo $this->Form->input('group_id',array("label"=>"Grupos","empty"=>"Seleccione...","type"=>"select","required"=>false));
echo $this->Form->input('action_id',array("label"=>"Funciones","empty"=>"Seleccione...","type"=>"select","required"=>false));
?>
</div>
<?
echo $this->Form->end(array('label'=>'Agregar','class'=>'btn btn-primary','div' => array("class"=>"form-group")));

?>