<div class="form-group">
<h3 class="page-header">Listado de Usuarios</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('User.id','#');?></th>
        <th><?php echo $this->Paginator->sort('User.username','Nombre');?></th>
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

                <?php echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/users/delete/'.$list['User']['id'], array('class' => 'btn btn-warning', 'escape' => false,'data-toggle'=>'tooltip', 'title'=>'Eliminar')); ?>
            </td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>