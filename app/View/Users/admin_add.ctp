<section class="panel panel-default">
        <div class="panel-heading">
        	<strong>
        		<span class="glyphicon glyphicon-th"></span>
				<?php echo $form_config["title"]; ?>
        	</strong>
        </div>
        <div class="panel-body">
<?php 
echo $this->Form->create('User', array('action' => $form_config["urlform"]));
?>
<div class="row">
	<div class="form-group">
	<?php 
	if($action == "admin_edit"){echo $this->Form->input('id');}
	echo $this->Form->input('username',array("label"=>"Nombre de Usuario","required"=>false,'class'=>'form-control'));?>
	</div>
	

	<div class="form-group">
	<?php  echo $this->Form->input('group_id',array('label'=>'Grupos','type'=>'select','empty'=>'Seleccione'));
	?>
	</div>


	<?php if($action == "admin_add"){ ?>
	<div class="form-group">
	<?php  echo $this->Form->input('password',array("label"=>"Clave de Acceso","required"=>false));?>
	</div>
	<?php } ?>

	
</div>
<?php
echo $this->Form->end(array('label'=>$form_config["labelbutton"],'class'=>'btn btn-primary','type'=>'submit'));

?>
</div>
 </section>

<?php if($action == "admin_add"){ ?>
 <script type="text/javascript">
	Controllers.push("Users.add");
</script>
<?php } ?>

