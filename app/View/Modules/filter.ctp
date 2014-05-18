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
                    echo $this->Form->create('Module', array('action' => $form_config["urlform"],'class'=>'form-horizontal','type' => 'get'));
                    ?>
                    <div class="row">
                        <div class="form-group">
                    <?php
                    if($action == "admin_edit"){echo $this->Form->input('id');}
                    echo $this->Form->input('Search.name',array("label"=>"Nombre del Modulo","required"=>false));?>
                        </div>

                    <div class="row">
                        <div class="form-group">
                    <?php
                    echo $this->Form->input('Search.order',array("label"=>"Orden en el menu","required"=>false));?>
                        </div>
 
                  </div>
                  <?php
            echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

            ?>
                </div>

                </div>
            </div>
        </div>