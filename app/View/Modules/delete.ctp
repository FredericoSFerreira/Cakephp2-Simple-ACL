<div class="form-group">
<h3 class="page-header">Listado de Modulos a Eliminar</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('Module.id','#');?></th>
        <th><?php echo $this->Paginator->sort('Module.name','Nombre');?></th>
        <th><?php echo $this->Paginator->sort('Module.order','Orden');?></th>
        <th class="actions" align="center"><div align="center"><?php echo 'Acciones';?></div></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['Module']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Module']['name']); ?>&nbsp;</td>
            <td><?php echo h($list['Module']['order']); ?>&nbsp;</td>
            <td class="actions">

                <?php echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/modules/delete/'.$list['Module']['id'], array('class' => 'btn btn-warning', 'escape' => false,'data-toggle'=>'tooltip', 'title'=>'Eliminar')); ?>
            </td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>