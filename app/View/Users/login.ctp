<?php 
echo $this->Form->create('User', array('action' => 'login','class'=>"form-signin"));
?>

<h2 class="form-signin-heading"><?php echo __("str_login_h2");?></h2>

<?php
echo $this->Form->input('username',array("label"=>false,"placeholder"=>__("str_login_input_username"),"class"=>"form-control","required"=>false));
echo $this->Form->input('password',array("label"=>false,"placeholder"=>__("str_login_input_password"),"class"=>"form-control","required"=>false));
?>


<?php
echo $this->Form->end(array('label'=>__('str_login_button'),'class'=>'btn btn-lg btn-primary btn-block'));
?>