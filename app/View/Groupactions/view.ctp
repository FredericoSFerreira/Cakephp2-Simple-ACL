<div class="groupactions view">
<h2><?php  echo __('Groupaction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupaction['Groupaction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupaction['Group']['name'], array('controller' => 'groups', 'action' => 'view', $groupaction['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actions'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupaction['Actions']['name'], array('controller' => 'actions', 'action' => 'view', $groupaction['Actions']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($groupaction['Groupaction']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($groupaction['Groupaction']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Groupaction'), array('action' => 'edit', $groupaction['Groupaction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Groupaction'), array('action' => 'delete', $groupaction['Groupaction']['id']), null, __('Are you sure you want to delete # %s?', $groupaction['Groupaction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groupactions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groupaction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions'), array('controller' => 'actions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actions'), array('controller' => 'actions', 'action' => 'add')); ?> </li>
	</ul>
</div>
