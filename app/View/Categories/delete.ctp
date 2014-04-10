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

                <?php echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/categories/delete/'.$list['Category']['id'], array('class' => 'btn btn-warning', 'escape' => false,'data-toggle'=>'tooltip', 'title'=>'Eliminar')); ?>
            </td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>