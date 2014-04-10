<div class="groupactions form">
<?php echo $this->Form->create('Groupaction'); ?>
	<fieldset>
		<legend><?php echo __('Add Groupaction'); ?></legend>
	<?php
		echo $this->Form->input('group_id');
		echo $this->Form->input('actions_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Groupactions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions'), array('controller' => 'actions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actions'), array('controller' => 'actions', 'action' => 'add')); ?> </li>
	</ul>
</div>
