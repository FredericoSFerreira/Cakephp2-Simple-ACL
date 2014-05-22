 <ul class="nav nav-tabs">
              <li><a href="#home" class="filter-tab" data-toggle="tab"><?php echo $form_config["title"]; ?></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane" id="home">
                
                <div class="panel panel-default">
                  <div class="panel-body">
                    <?php 
                    echo $this->Form->create('User', array('action' => $form_config["urlform"],'class'=>'form-horizontal','type' => 'get'));
                    ?>
                    <div class="row">
                        <div class="form-group">
                    <?php echo $this->Form->input('username',array("label"=>"Nombre de Usuario","required"=>false,'class'=>'form-control'));?>
                        </div>
                        <div class="form-group">
                    <?php  echo $this->Form->input('group_id',array('label'=>'Grupos','type'=>'select','empty'=>'Seleccione'));?>
                        </div>
                    </div>
                 
                  <?php
            echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

            ?>
                </div>

                </div>
            </div>
        </div>