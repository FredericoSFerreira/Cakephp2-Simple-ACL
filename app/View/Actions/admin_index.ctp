<section class="panel panel-default">
    <div class="panel-heading">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <?php echo __("Listado de Funciones"); ?>
        </strong>
    </div>

    <div class="panel-body">
        
        <?php include_once('filters.ctp'); ?>
        
        <?php
            $actionmultipleselect = array('admin_delete');
        ?>

        <?php
            if(in_array($action, $actionmultipleselect)){ 
        ?>
        <?php 
            echo $this->Form->create('Action', array('action' => 'admin_deletemulti','type' => 'post'));
        ?>
        <?php } ?>
        <table class="table table-bordered">
           <thead>
            <tr> 
                <?php
                    if(in_array($action, $actionmultipleselect)){ 
                ?>
                <th><input type="checkbox" class="checkallclick" title="Check All"></th>
                <?php } ?>
                <th><?php echo $this->Paginator->sort('Action.id','#');?></th>
                <th><?php echo $this->Paginator->sort('Action.name','Nombre');?></th>
                <th><?php echo $this->Paginator->sort('Action.url','Url');?></th>
                <th><?php echo $this->Paginator->sort('Action.order','Orden');?></th>
                <th><?php echo $this->Paginator->sort('Category.name','Categoria');?></th>
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
                    <?php
                        if(in_array($action, $actionmultipleselect)){ 
                    ?>
                    <td style="width: 10px;">
                        <input type="checkbox" class="actionsdelete-check" multitext="#<?php echo h($list['Action']['id']); ?> - <?php echo h($list['Action']['name']); ?>" name="data[Action][id][]" value="<?php echo $list['Action']['id'];?>"/> 
                    </td>
                    <?php } ?>
                    <td style="width: 10px;"><?php echo h($list['Action']['id']); ?>&nbsp;</td>
                    <td><?php echo h($list['Action']['name']); ?>&nbsp;</td>
                    <td><?php echo h($list['Action']['url']); ?>&nbsp;</td>
                    <td><?php echo h($list['Action']['order']); ?>&nbsp;</td>
                    <td><?php echo h($list['Categories']['name']); ?>&nbsp;</td>
                    <?php 
                    if(in_array($action, $actionlocate)){  
                    ?>  
                     <td class="actions">
                            
                        <?php 

                        if($action == "admin_edit"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Editar', '/admin/actions/edit/'.$list['Action']['id'], array('class' => 'btn btn-warning', 'escape' => false)); 
                        }

                         if($action == "admin_delete"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/admin/actions/delete/'.$list['Action']['id'], array('class' => 'btn btn-warning deleteitem','data-confirm-title'=>__("Confirmación para eliminar"),'data-confirm-msg'=>__("Deseas eliminar el registro #").$list['Action']['id']." ?", 'escape' => false));
                        }

                        ?>
                    </td>
                    <?php } ?>
        	   </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
        
        <?php
            if(in_array($action, $actionmultipleselect)){ 
        ?>
        <div class="checkalldiv">
            <script>
                checkalltext = {
                    'empty' : {
                        'title' : 'Advertencia',
                        'text' : 'Debe seleccionar al menos una función para utilizar la opción sobre multiples registros'
                    },
                    'deleteall' :{
                        'title' : 'Confirmación para eliminar multiples registros',
                        'url' : '/admin/actions/deletemulti/',
                        'pretext' : 'Estas seguro que deseas eliminar los siguientes registros?'
                    } 
                };
            </script>
            <img class="selectallarrow" src="/img/arrow_ltr.png" width="38" height="22" alt="With selected:">
            <input type="checkbox" class="checkallclick" title="Check All">
            <label for="checkall">Check All</label> 
            <select id="selectmulti" name="submit_mult" class="autosubmit" style="margin-left:10px;"><option value="0" selected="selected">With selected:</option>
                <option value="deleteall">Delete All</option>
            </select>
        </div>
        <?php echo $this->Form->end(); ?>
        <?php } ?>

        <?php echo $this->element('paginado'); ?>
    </div>
</section>
<?php if($action == "admin_index"){ ?>
 <script type="text/javascript">
    Controllers.push("Actions.index");
</script>
<?php } ?>