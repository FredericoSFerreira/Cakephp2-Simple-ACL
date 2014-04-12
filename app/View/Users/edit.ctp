<?php
if(empty($id)){
?>
<div class="form-group">
<h3 class="page-header">Listado de Usuarios</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('User.id','#');?></th>
        <th><?php echo $this->Paginator->sort('User.username','Nombre de Usuario');?></th>
        <th><?php echo $this->Paginator->sort('Group.name','Grupo');?></th>
        <th class="actions" align="center"><div align="center"><?php echo 'Acciones';?></div></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['User']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['User']['username']); ?>&nbsp;</td>
            <td><?php echo h($list['Group']['name']); ?>&nbsp;</td>
            <td class="actions">
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Editar', '/users/edit/'.$list['User']['id'], array('class' => 'btn btn-warning', 'escape' => false,'data-toggle'=>'tooltip', 'title'=>'Editar')); ?>
            </td>
       </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>
<?php }else{ ?>

<?php 
echo $this->Form->create('User', array('action' => 'edit/'));
?>
<div class="form-group">
<h3 class="page-header">Editar Usuario</h3>

<?php
echo $this->Form->input('id');
echo $this->Form->input('username',array("label"=>"Nombre de Usuario","required"=>false));
echo $this->Form->input('group_id',array('label'=>'Grupos','type'=>'select','empty'=>'Seleccione'));
?>
</div>
<?
echo $this->Form->end(array('label'=>'Guardar','class'=>'btn btn-primary','div' => array("class"=>"form-group")));

?>

<?php } ?>