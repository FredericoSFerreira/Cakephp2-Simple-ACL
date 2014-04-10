<?php 
echo $this->Form->create('Action', array('action' => 'add'));
?>
<div class="form-group">
<h3 class="page-header">Agregar Nueva Función</h3>

<?php
echo $this->Form->input('name',array("label"=>"Nombre de Funcion","required"=>false));
echo $this->Form->input('url',array("label"=>"Url de Funcion","required"=>false));
echo $this->Form->input('order',array("label"=>"Orden en el menu","required"=>false));
echo $this->Form->input('categories_id',array("label"=>"Categorias","empty"=>"Seleccione","type"=>"select","required"=>false));
?>
</div>
<?
echo $this->Form->end(array('label'=>'Agregar','class'=>'btn btn-primary','div' => array("class"=>"form-group")));

?>



