<?php
if(empty($id)){
?>
<div class="form-group">
<h3 class="page-header">Listado de Categorias</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('Category.id','#');?></th>
        <th><?php echo $this->Paginator->sort('Category.name','Nombre');?></th>
        <th><?php echo $this->Paginator->sort('Category.order','Orden');?></th>
        <th><?php echo $this->Paginator->sort('Module.name','Modulo');?></th>
        <th class="actions" align="center"><div align="center"><?php echo 'Acciones';?></div></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['Category']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Category']['name']); ?>&nbsp;</td>
            <td><?php echo h($list['Category']['order']); ?>&nbsp;</td>
            <td><?php echo h($list['Modules']['name']); ?>&nbsp;</td>
            <td class="actions">

                <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Editar', '/categories/edit/'.$list['Category']['id'], array('class' => 'btn btn-warning', 'escape' => false,'data-toggle'=>'tooltip', 'title'=>'Editar')); ?>
            </td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>
<?php }else{ ?>

<?php 
echo $this->Form->create('Category', array('action' => 'edit/'));
?>
<div class="form-group">
<h3 class="page-header">Editar Categoria</h3>

<?php
echo $this->Form->input('id');
echo $this->Form->input('name',array("label"=>"Nombre de Categoria","required"=>false));
echo $this->Form->input('order',array("label"=>"Orden en el menu","required"=>false));
echo $this->Form->input('module_id',array("label"=>"Modulos","empty"=>"Seleccione","type"=>"select","required"=>false));
?>
</div>
<?
echo $this->Form->end(array('label'=>'Guardar','class'=>'btn btn-primary','div' => array("class"=>"form-group")));

?>

<?php } ?>


