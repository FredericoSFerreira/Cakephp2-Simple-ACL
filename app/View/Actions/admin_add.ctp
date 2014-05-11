<section class="panel panel-default">
        <div class="panel-heading">
        	<strong>
        		<span class="glyphicon glyphicon-th"></span>
				<?php echo $form_config["title"]; ?>
        	</strong>
        </div>
        <div class="panel-body">
<?php 
echo $this->Form->create('Action', array('action' => $form_config["urlform"],'class'=>'form-horizontal'));
?>
<div class="row">
	<div class="form-group">
<?php
if($action == "admin_edit"){echo $this->Form->input('id');}
echo $this->Form->input('Action.name.esp',array("label"=>"Nombre de Funcion (ESP)","required"=>false));
?>
	</div>

	<div class="form-group">
<?php
echo $this->Form->input('Action.name.eng',array("label"=>"Nombre de Funcion (ENG)","required"=>false));
?>
	</div>

	<div class="form-group">
<?php
echo $this->Form->input('Action.name.fra',array("label"=>"Nombre de Funcion (FRA)","required"=>false));
?>
	</div>

	<div class="form-group">
<?php
echo $this->Form->input('Action.name.por',array("label"=>"Nombre de Funcion (POR)","required"=>false));
?>
	</div>

	<div class="form-group">
<?php echo $this->Form->input('Action.url',array("label"=>"Url de Funcion","required"=>false));?>
	</div>

</div>
<div class="row">
	<div class="form-group">
<?php
echo $this->Form->input('Action.order',array("label"=>"Orden en el menu","required"=>false));?>
	</div>

	<div class="form-group">
<?php echo $this->Form->input('Action.category_id',array("label"=>"Categorias","empty"=>"Seleccione","type"=>"select","required"=>false));
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
	Controllers.push("Actions.add");
</script>
<?php } ?>


