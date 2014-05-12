<section class="panel panel-default">
    <div class="panel-heading">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <?php echo __("Listado de grupos"); ?>
        </strong>
    </div>

    <div class="panel-body">

            <ul class="nav nav-tabs">
              <li><a href="#home" class="filter-tab" data-toggle="tab"><?php echo $form_config["title"]; ?></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane" id="home">
                
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?php 
                    echo $this->Form->create('Group', array('action' => $form_config["urlform"],'class'=>'form-horizontal','type' => 'get'));
                    ?>
                    <div class="row">
                        <div class="form-group">
                    <?php echo $this->Form->input('Search.name',array("label"=>"Nombre de Grupo","required"=>false));?>
                        </div>

                    </div>
                 
                  <?php
            echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

            ?>
                </div>

                </div>
            </div>
        </div>



        <table class="table table-bordered">
           <thead>
            <tr> 
                <th><?php echo $this->Paginator->sort('Group.id','#');?></th>
                <th><?php echo $this->Paginator->sort('Group.name','Nombre');?></th>
                
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
                    <td style="width: 10px;"><?php echo h($list['Group']['id']); ?>&nbsp;</td>
                    <td><?php echo h($list['Group']['name']); ?>&nbsp;</td>
                    
                    <?php 
                    if(in_array($action, $actionlocate)){  
                    ?>  
                     <td class="actions">
                            
                        <?php 

                        if($action == "admin_edit"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> Editar', '/admin/groups/edit/'.$list['Group']['id'], array('class' => 'btn btn-warning', 'escape' => false)); 
                        }

                         if($action == "admin_delete"){
                        echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span> Eliminar', '/admin/groups/delete/'.$list['Group']['id'], array('class' => 'btn btn-warning deleteitem','data-confirm-title'=>__("Confirmación para eliminar"),'data-confirm-msg'=>__("Deseas eliminar el registro #").$list['Group']['id']." ?", 'escape' => false));
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
    Controllers.push("Groups.index");
</script>
<?php } ?>