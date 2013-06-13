<?php 
echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => __('Login Access'),
    'username',
    'password'
));
echo $this->Form->end('Login');
?>
<?php echo $this->element('menu'); ?>