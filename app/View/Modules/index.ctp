<div class="form-group">
<h3 class="page-header">Listado de Modulos</h3>
</div>

<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('Module.id','#');?></th>
        <th><?php echo $this->Paginator->sort('Module.name','Nombre');?></th>
        <th><?php echo $this->Paginator->sort('Module.order','Orden');?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['Module']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Module']['name']); ?>&nbsp;</td>
            <td><?php echo h($list['Module']['order']); ?>&nbsp;</td>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>