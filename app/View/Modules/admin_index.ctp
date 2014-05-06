<section class="panel panel-default">
    <div class="panel-heading">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <?php echo __("Listado de Modulos"); ?>
        </strong>
    </div>

    <div class="panel-body">
        <table class="table table-bordered">
           <thead>
            <tr> 
                <th><?php echo $this->Paginator->sort('Module.id','#');?></th>
                <th><?php echo $this->Paginator->sort('Module.name','Nombre');?></th>
                <th><?php echo $this->Paginator->sort('Module.order','Orden');?></th>

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
                    <td style="width: 10px;"><?php echo h($list['Module']['id']); ?>&nbsp;</td>
                    <td><?php echo h($list['Module']['name']); ?>&nbsp;</td>
                    <td><?php echo h($list['Module']['order']); ?>&nbsp;</td>

                     <?php 
                    if(in_array($action, $actionlocate)){  
                    ?>  
                     <td class="actions">
                            
                        <?php 

                        if($action == "admin_edit"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Editar', '/admin/modules/edit/'.$list['Module']['id'], array('class' => 'btn btn-warning', 'escape' => false)); 
                        }

                         if($action == "admin_delete"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/admin/modules/delete/'.$list['Module']['id'], array('class' => 'btn btn-warning deleteitem','data-confirm-title'=>__("Confirmación para eliminar"),'data-confirm-msg'=>__("Deseas eliminar el registro #").$list['Module']['id']." ?", 'escape' => false));
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
 <?php if($action == "admin_index"){ ?>
 <script type="text/javascript">
    Controllers.push("Modules.index");
</script>
<?php } ?>