<section class="panel panel-default">
    <div class="panel-heading">
        <strong>
            <span class="glyphicon glyphicon-th"></span>
            <?php echo __("str_login_h2"); ?>
        </strong>
    </div>

    <div class="panel-body">
		<?php 
		echo $this->Form->create('User', array('action' => 'login','class'=>"form-signin"));
		?>
		<div class="form-group">
		<?php
		echo $this->Form->input('username',array("label"=>false,"placeholder"=>__("str_login_input_username"),"class"=>"form-control","required"=>false));?>
		</div>

		<div class="form-group">
		<?php
		echo $this->Form->input('password',array("label"=>false,"placeholder"=>__("str_login_input_password"),"class"=>"form-control","required"=>false));
		?>
		</div>


		<?php
		echo $this->Form->end(array('label'=>__('str_login_button'),'class'=>'btn btn-lg btn-primary btn-block'));
		?>
		<script type="text/javascript">
			Controllers.push("Users.login");
		</script>
	</div>
</section>