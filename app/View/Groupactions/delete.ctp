<div class="form-group">
<h3 class="page-header">Listado de Grupos / Funciones</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('Groupaction.id','#');?></th>
        <th><?php echo $this->Paginator->sort('Group.name','Grupo');?></th>
        <th><?php echo $this->Paginator->sort('Actions.name','Función');?></th>
        <th class="actions" align="center"><div align="center"><?php echo 'Acciones';?></div></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['Groupaction']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Group']['name']); ?>&nbsp;</td>
            <td><?php echo h($list['Actions']['name']); ?>&nbsp;</td>
            <td class="actions">

                <?php echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/groupactions/delete/'.$list['Groupaction']['id'], array('class' => 'btn btn-warning', 'escape' => false,'data-toggle'=>'tooltip', 'title'=>'Eliminar')); ?>
            </td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>