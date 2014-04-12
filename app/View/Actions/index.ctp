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
        <th><?php echo $this->Paginator->sort('Category.name','Categoria');?></th>
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
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>
