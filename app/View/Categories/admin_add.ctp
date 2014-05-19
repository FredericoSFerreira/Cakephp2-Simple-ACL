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
		<?php if($action == "admin_edit"){echo $this->Form->input('id');}
			echo $this->Form->input('Category.name.esp',array("label"=>"Nombre de Categoria (ESP)","required"=>false));?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('Category.name.eng',array("label"=>"Nombre de Categoria (ENG)","required"=>false));?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('Category.name.fra',array("label"=>"Nombre de Categoria (FRA)","required"=>false));?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('Category.name.pro',array("label"=>"Nombre de Categoria (POR)","required"=>false));?>
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
		<?php
			echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

		?>
	</div>
 </section>

 <?php if($action == "admin_add"){ ?>
 <script type="text/javascript">
	Controllers.push("Categories.add");
</script>
<?php } ?>



