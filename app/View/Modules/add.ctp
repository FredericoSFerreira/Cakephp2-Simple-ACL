<?php 
echo $this->Form->create('Module', array('action' => 'add'));
?>
<div class="form-group">
<h3 class="page-header">Agregar Nuevo Modulo</h3>

<?php
echo $this->Form->input('name',array("label"=>"Nombre del modulo","required"=>false));
?>
</div>
<?
echo $this->Form->end(array('label'=>'Agregar','class'=>'btn btn-primary','div' => array("class"=>"form-group")));

?>