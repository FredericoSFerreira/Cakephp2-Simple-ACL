<?php 
echo $this->Form->create('Category', array('action' => 'add'));
?>
<div class="form-group">
<h3 class="page-header">Agregar Nueva Categoria</h3>

<?php
echo $this->Form->input('name',array("label"=>"Nombre de Categoria","required"=>false));
echo $this->Form->input('order',array("label"=>"Orden en el menu","required"=>false));
echo $this->Form->input('module_id',array("label"=>"Modulos","empty"=>"Seleccione","type"=>"select","required"=>false));
?>
</div>
<?
echo $this->Form->end(array('label'=>'Agregar','class'=>'btn btn-primary','div' => array("class"=>"form-group")));

?>



