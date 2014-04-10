<div class="actions view">
<h2><?php  echo __('Action'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($action['Action']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($action['Action']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($action['Action']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($action['Action']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categories'); ?></dt>
		<dd>
			<?php echo $this->Html->link($action['Categories']['name'], array('controller' => 'categories', 'action' => 'view', $action['Categories']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($action['Action']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($action['Action']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Action'), array('action' => 'edit', $action['Action']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Action'), array('action' => 'delete', $action['Action']['id']), null, __('Are you sure you want to delete # %s?', $action['Action']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
