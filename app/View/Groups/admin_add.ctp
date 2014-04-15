<section class="panel panel-default">
        <div class="panel-heading">
        	<strong>
        		<span class="glyphicon glyphicon-th"></span>
				<?php echo $form_config["title"]; ?>
        	</strong>
        </div>
        <div class="panel-body">
	        <?php 
				echo $this->Form->create('Group', array('action' => $form_config["urlform"],'class'=>'form-horizontal'));
			?>
			<div class="row">
				<div class="form-group">
				<?php

					if($action == "edit"){echo $this->Form->input('id');}
					echo $this->Form->input('name',array("label"=>"Nombre del Grupo","required"=>false,'class'=>'form-control'));
				?>
				</div>
			</div>
			<?
			echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

			?>
        </div>
 </section>