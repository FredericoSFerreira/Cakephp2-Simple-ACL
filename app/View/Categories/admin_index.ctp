<section class="panel panel-default">
    <div class="panel-heading">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <?php echo __("Listado de Categorias"); ?>
        </strong>
    </div>

    <div class="panel-body">

        <table class="table table-bordered">
           <thead>
            <tr> 
                <th><?php echo $this->Paginator->sort('Category.id','#');?></th>
                <th><?php echo $this->Paginator->sort('Category.name','Nombre');?></th>
                <th><?php echo $this->Paginator->sort('Category.order','Orden');?></th>
                <th><?php echo $this->Paginator->sort('Module.name','Modulo');?></th>
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
                    <td style="width: 10px;"><?php echo h($list['Category']['id']); ?>&nbsp;</td>
                    <td><?php echo h($list['Category']['name']); ?>&nbsp;</td>
                    <td><?php echo h($list['Category']['order']); ?>&nbsp;</td>
                    <td><?php echo h($list['Modules']['name']); ?>&nbsp;</td>

                    <?php 
                    if(in_array($action, $actionlocate)){  
                    ?>  
                     <td class="actions">
                            
                        <?php 

                        if($action == "admin_edit"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Editar', '/admin/categories/edit/'.$list['Category']['id'], array('class' => 'btn btn-warning', 'escape' => false)); 
                        }

                         if($action == "admin_delete"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/admin/categories/delete/'.$list['Category']['id'], array('class' => 'btn btn-warning deleteitem','data-confirm-title'=>__("Confirmación para eliminar"),'data-confirm-msg'=>__("Deseas eliminar el registro #").$list['Category']['id']." ?", 'escape' => false));
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
    Controllers.push("Categories.index");
</script>
<?php } ?>