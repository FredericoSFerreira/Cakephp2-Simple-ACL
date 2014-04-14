<section class="panel panel-default">
        <div class="panel-heading">
        	<strong>
        		<span class="glyphicon glyphicon-th"></span>
				<?php echo $form_config["title"]; ?>
        	</strong>
        </div>
        <div class="panel-body">
<?php 
echo $this->Form->create('User', array('action' => 'add'));
?>
<div class="row">
	<div class="form-group">
	<?php 
	if($action == "edit"){echo $this->Form->input('id');}
	echo $this->Form->input('username',array("label"=>"Nombre de Usuario","required"=>false));?>
	</div>

	<div class="form-group">
	<?php  echo $this->Form->input('group_id',array('label'=>'Grupos','type'=>'select','empty'=>'Seleccione'));
	?>
	</div>
</div>

<div class="row">

	<?php if($action == "add"){ ?>
	<div class="form-group">
	<?php  echo $this->Form->input('password',array("label"=>"Clave de Acceso","required"=>false));?>
	</div>
	<?php } ?>

	
</div>
<?
echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

?>
</div>
 </section>