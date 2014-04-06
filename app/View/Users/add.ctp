<?php 
echo $this->Form->create('User', array('action' => 'add'));
?>
<div class="form-group">
<h3 class="page-header">Agregar Nuevo Usuario</h3>

<?php 
echo $this->Form->input('username',array("label"=>"Nombre de Usuario","required"=>false));
echo $this->Form->input('password',array("label"=>"Clave de Acceso","required"=>false));
echo $this->Form->input('group_id',array('label'=>'Groupos','type'=>'select','empty'=>'Seleccione'));
?>
</div>
<?
echo $this->Form->end(array('label'=>'Agregar','class'=>'btn btn-primary','div' => array("class"=>"form-group")));

?>