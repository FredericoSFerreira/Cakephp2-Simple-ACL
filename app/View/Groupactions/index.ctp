<section class="panel panel-default">
    <div class="panel-heading">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <?php echo __("Listado de Funciones por Grupos"); ?>
        </strong>
    </div>

    <div class="panel-body">
<table class="table table-bordered">
   <thead>
    <tr> 
        <th><?php echo $this->Paginator->sort('Groupaction.id','#');?></th>
        <th><?php echo $this->Paginator->sort('Group.name','Grupo');?></th>
        <th><?php echo $this->Paginator->sort('Actions.name','Función');?></th>
        <?php 
                $actionlocate = array('delete');
                if(in_array($action, $actionlocate)){ 
                ?>
                <th class="actions" align="center"><div align="center"><?php echo 'Acciones';?></div></th>
                <?php } ?>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td style="width: 10px;"><?php echo h($list['Groupaction']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Group']['name']); ?>&nbsp;</td>
            <td><?php echo h($list['Actions']['name']); ?>&nbsp;</td>
            <?php 
                    if(in_array($action, $actionlocate)){  
                    ?>  
                     <td class="actions">
                            
                        <?php 
                         if($action == "delete"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/groupactions/delete/'.$list['Groupaction']['id'], array('class' => 'btn btn-warning deleteitem','data-confirm-title'=>__("Confirmación para eliminar"),'data-confirm-msg'=>__("Deseas eliminar el registro #").$list['Groupaction']['id']." ?", 'escape' => false));
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