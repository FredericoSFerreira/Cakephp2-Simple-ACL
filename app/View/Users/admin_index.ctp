<section class="panel panel-default">
    <div class="panel-heading">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <?php echo __("Listado de Usuarios"); ?>
        </strong>
    </div>

    <div class="panel-body">
<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('User.id','#');?></th>
        <th><?php echo $this->Paginator->sort('User.username','Nombre de Usuario');?></th>
        <th><?php echo $this->Paginator->sort('Group.name','Grupo');?></th>
        <?php 
                $actionlocate = array('admin_edit','admin_delete');
                if(in_array($action, $actionlocate)){ 
                ?>
                <th class="actions" align="center"><div align="center"><?php echo 'Acciones';?></div></th>
                <?php } ?>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['User']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['User']['username']); ?>&nbsp;</td>
            <td><?php echo h($list['Group']['name']); ?>&nbsp;</td>
            <?php 
                    if(in_array($action, $actionlocate)){  
                    ?>  
                     <td class="actions">
                            
                        <?php 

                        if($action == "admin_edit"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Editar', '/admin/users/edit/'.$list['User']['id'], array('class' => 'btn btn-warning', 'escape' => false)); 
                        }

                         if($action == "admin_delete"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/admin/users/delete/'.$list['User']['id'], array('class' => 'btn btn-warning deleteitem','data-confirm-title'=>__("Confirmación para eliminar"),'data-confirm-msg'=>__("Deseas eliminar el registro #").$list['User']['id']." ?", 'escape' => false));
                        }

                        ?>
                    </td>
                    <?php } ?>
	   </tr>
        <?php endforeach; ?>
    </tbody>
    
</table>
<?php echo $this->element('paginado'); ?>
</div>
</section>