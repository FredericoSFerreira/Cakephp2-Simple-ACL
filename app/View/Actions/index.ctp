<div class="actions index">
	<h2><?php echo __('Actions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('categories_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($actions as $action): ?>
	<tr>
		<td><?php echo h($action['Action']['id']); ?>&nbsp;</td>
		<td><?php echo h($action['Action']['name']); ?>&nbsp;</td>
		<td><?php echo h($action['Action']['url']); ?>&nbsp;</td>
		<td><?php echo h($action['Action']['order']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($action['Categories']['name'], array('controller' => 'categories', 'action' => 'view', $action['Categories']['id'])); ?>
		</td>
		<td><?php echo h($action['Action']['created']); ?>&nbsp;</td>
		<td><?php echo h($action['Action']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $action['Action']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $action['Action']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $action['Action']['id']), null, __('Are you sure you want to delete # %s?', $action['Action']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Action'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
