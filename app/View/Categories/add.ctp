<section class="panel panel-default">
        <div class="panel-heading">
        	<strong>
        		<span class="glyphicon glyphicon-th"></span>
				<?php echo $form_config["title"]; ?>
        	</strong>
        </div>
        <div class="panel-body">


		<?php 
		echo $this->Form->create('Category', array('action' => $form_config["urlform"]));
		?>
		<div class="row">
				<div class="form-group">

		<?php
		if($action == "edit"){echo $this->Form->input('id');}
		echo $this->Form->input('name',array("label"=>"Nombre de Categoria","required"=>false));?>
				</div>

			<div class="form-group">
			<?php echo $this->Form->input('order',array("label"=>"Orden en el menu","required"=>false));?>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
			<?php echo $this->Form->input('module_id',array("label"=>"Modulos","empty"=>"Seleccione","type"=>"select","required"=>false));
			?>
			</div>
		</div>
		<?
			echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

		?>
	</div>
 </section>



