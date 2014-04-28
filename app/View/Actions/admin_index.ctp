<section class="panel panel-default">
    <div class="panel-heading">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <?php echo __("Listado de Funciones"); ?>
        </strong>
    </div>

    <div class="panel-body">
        
        <div>
            <ul class="nav nav-tabs">
              <li><a href="#home" class="filter-tab" data-toggle="tab"><?php echo $form_config["title"]; ?></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane" id="home">
                
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?php 
                    echo $this->Form->create('Action', array('action' => $form_config["urlform"],'class'=>'form-horizontal','type' => 'get'));
                    ?>
                    <div class="row">
                        <div class="form-group">
                    <?php
                    if($action == "admin_edit"){echo $this->Form->input('id');}
                    echo $this->Form->input('Search.name',array("label"=>"Nombre de Funcion","required"=>false));?>
                        </div>

                        <div class="form-group">
                    <?php echo $this->Form->input('Search.url',array("label"=>"Url de Funcion","required"=>false));?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group">
                    <?php
                    echo $this->Form->input('Search.order',array("label"=>"Orden en el menu","required"=>false));?>
                        </div>

                        <div class="form-group">
                    <?php echo $this->Form->input('Search.category_id',array("label"=>"Categorias","empty"=>"Seleccione","type"=>"select","required"=>false));
                    ?>
                        </div>
                  </div>
                  <?
            echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

            ?>
                </div>

                </div>
            </div>
        </div>

        <table class="table table-bordered">
           <thead>
            <tr> 
                <?php
                    $actionmultipleselect = array('admin_delete');
                    if(in_array($action, $actionmultipleselect)){ 
                ?>
                <th></th>
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
                        <input type="checkbox" name="Action.id[]"/> 
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
        <?php echo $this->element('paginado'); ?>
    </div>
</section>
<?php if($action == "admin_index"){ ?>
 <script type="text/javascript">
    Controllers.push("Actions.index");
</script>
<?php } ?>