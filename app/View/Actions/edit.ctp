<?php
if(empty($id)){
?>
<div class="form-group">
<h3 class="page-header">Listado de Funciones</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('Action.id','#');?></th>
        <th><?php echo $this->Paginator->sort('Action.name','Nombre');?></th>
        <th><?php echo $this->Paginator->sort('Action.url','Url');?></th>
        <th><?php echo $this->Paginator->sort('Action.order','Orden');?></th>
        <th><?php echo $this->Paginator->sort('Category.name','Modulo');?></th>
        <th class="actions" align="center"><div align="center"><?php echo 'Acciones';?></div></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['Action']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Action']['name']); ?>&nbsp;</td>
            <td><?php echo h($list['Action']['url']); ?>&nbsp;</td>
            <td><?php echo h($list['Action']['order']); ?>&nbsp;</td>
            <td><?php echo h($list['Categories']['name']); ?>&nbsp;</td>
            <td class="actions">

                <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Editar', '/actions/edit/'.$list['Action']['id'], array('class' => 'btn btn-warning', 'escape' => false,'data-toggle'=>'tooltip', 'title'=>'Editar')); ?>
            </td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>
<?php }else{ ?>

<?php 
echo $this->Form->create('Action', array('action' => 'edit/'));
?>
<div class="form-group">
<h3 class="page-header">Editar Funciones</h3>

<?php
echo $this->Form->input('id');
echo $this->Form->input('name',array("label"=>"Nombre de Funcion","required"=>false));
echo $this->Form->input('url',array("label"=>"Url","required"=>false));
echo $this->Form->input('order',array("label"=>"Orden en el menu","required"=>false));
echo $this->Form->input('category_id',array("label"=>"Categorias","empty"=>"Seleccione","type"=>"select","required"=>false));
?>
</div>
<?
echo $this->Form->end(array('label'=>'Guardar','class'=>'btn btn-primary','div' => array("class"=>"form-group")));

?>

<?php } ?>


