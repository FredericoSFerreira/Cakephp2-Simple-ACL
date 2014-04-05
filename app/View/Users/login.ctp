<?php 
echo $this->Form->create('User', array('action' => 'login','class'=>"form-signin"));
?>

<h2 class="form-signin-heading">Please sign in</h2>

<?php
echo $this->Form->input('username',array("label"=>false,"placeholder"=>"Username","class"=>"form-control"));
echo $this->Form->input('password',array("label"=>false,"placeholder"=>"Password","class"=>"form-control"));
?>


<?php
echo $this->Form->end(array('label'=>'Iniciar Sesión','class'=>'btn btn-lg btn-primary btn-block'));
?>