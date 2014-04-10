<div class="modules form">
<?php echo $this->Form->create('Module'); ?>
	<fieldset>
		<legend><?php echo __('Add Module'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Modules'), array('action' => 'index')); ?></li>
	</ul>
</div>
