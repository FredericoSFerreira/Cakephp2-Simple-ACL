<?php 
echo $this->Form->create('Group', array('action' => 'add'));
echo $this->Form->inputs(array(
    'legend' => __('Group'),
    'name',
));
echo $this->Form->end('Save');
?>
<?php echo $this->element('menu'); ?>