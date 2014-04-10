<?php
if(empty($id)){
?>
<div class="form-group">
<h3 class="page-header">Listado de Modulos a Editar</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('Module.id','#');?></th>
        <th><?php echo $this->Paginator->sort('Module.name','Nombre');?></th>
        <th class="actions" align="center"><div align="center"><?php echo 'Acciones';?></div></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['Module']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Module']['name']); ?>&nbsp;</td>
            <td class="actions">

                <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Editar', '/modules/edit/'.$list['Module']['id'], array('class' => 'btn btn-warning', 'escape' => false,'data-toggle'=>'tooltip', 'title'=>'Editar')); ?>
            </td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>
<?php }else{ ?>

<?php 
echo $this->Form->create('Module', array('action' => 'edit/'));
?>
<div class="form-group">
<h3 class="page-header">Editar Modulo</h3>

<?php
echo $this->Form->input('id');
echo $this->Form->input('name',array("label"=>"Nombre del Grupo","required"=>false));
?>
</div>
<?
echo $this->Form->end(array('label'=>'Guardar','class'=>'btn btn-primary','div' => array("class"=>"form-group")));

?>

<?php } ?>