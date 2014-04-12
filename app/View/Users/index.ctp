<div class="form-group">
<h3 class="page-header">Listado de Usuarios</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('User.id','#');?></th>
        <th><?php echo $this->Paginator->sort('User.username','Nombre de Usuario');?></th>
        <th><?php echo $this->Paginator->sort('Group.name','Grupo');?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['User']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['User']['username']); ?>&nbsp;</td>
            <td><?php echo h($list['Group']['name']); ?>&nbsp;</td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>