<section class="panel panel-default">
        <div class="panel-heading">
        	<strong>
        		<span class="glyphicon glyphicon-th"></span>
				<?php echo $form_config["title"]; ?>
        	</strong>
        </div>
        <div class="panel-body">
			<?php 
			echo $this->Form->create('Module', array('action' => $form_config["urlform"],'class'=>'form-horizontal'));
			?>
			<div class="row">
				<div class="form-group">
				<?php

					if($action == "admin_edit"){echo $this->Form->input('id');}
				  	echo $this->Form->input('Module.name.esp',array("label"=>"Nombre del modulo (ESP)","required"=>false)); ?>
				</div>
				<div class="form-group">
				<?php
					echo $this->Form->input('Module.name.eng',array("label"=>"Nombre del modulo (ENG)","required"=>false)); ?>
				</div>
				<div class="form-group">
				<?php
					echo $this->Form->input('Module.name.fra',array("label"=>"Nombre del modulo (FRA)","required"=>false)); ?>
				</div>
				<div class="form-group">
				<?php
					echo $this->Form->input('Module.name.por',array("label"=>"Nombre del modulo (POR)","required"=>false)); ?>
				</div>

				<div class="form-group">
				<?php echo $this->Form->input('order',array("label"=>"Orden","required"=>false));
				?>
				</div>
			</div>
			<?php
			echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

			?>
		</div>
 </section>

 <?php if($action == "admin_add"){ ?>
 <script type="text/javascript">
	Controllers.push("Modules.add");
</script>
<?php } ?>