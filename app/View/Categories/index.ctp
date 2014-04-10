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
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['Category']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Category']['name']); ?>&nbsp;</td>
            <td><?php echo h($list['Category']['order']); ?>&nbsp;</td>
            <td><?php echo h($list['Modules']['name']); ?>&nbsp;</td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>
