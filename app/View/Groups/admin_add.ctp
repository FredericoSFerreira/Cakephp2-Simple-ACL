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
					if($action == "admin-edit"){echo $this->Form->input('id');}
					echo $this->Form->input('Group.name.esp',array("label"=>"Nombre del Grupo (ESP)","required"=>false,'class'=>'form-control'));
					echo $this->Form->input('Group.name.eng',array("label"=>"Nombre del Grupo (ENG)","required"=>false,'class'=>'form-control'));
					echo $this->Form->input('Group.name.fra',array("label"=>"Nombre del Grupo (FRA)","required"=>false,'class'=>'form-control'));
					echo $this->Form->input('Group.name.por',array("label"=>"Nombre del Grupo (POR)","required"=>false,'class'=>'form-control'));
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
	Controllers.push("Groups.add");
</script>
<?php } ?>