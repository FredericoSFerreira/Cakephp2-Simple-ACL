<?php 
echo $this->Form->create('User', array('action' => 'register'));
echo $this->Form->inputs(array(
    'legend' => __('Register'),
    'username',
    'password'
));
echo $this->Form->input('group_id',array('label'=>'Group','type'=>'select','empty'=>''));
echo $this->Form->end('Save');
?>