<div class="form-group">
<h3 class="page-header">Listado de Funciones por Grupos</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('Groupaction.id','#');?></th>
        <th><?php echo $this->Paginator->sort('Group.name','Grupo');?></th>
        <th><?php echo $this->Paginator->sort('Actions.name','Función');?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['Groupaction']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Group']['name']); ?>&nbsp;</td>
            <td><?php echo h($list['Actions']['name']); ?>&nbsp;</td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>