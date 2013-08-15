<div class="extraActivities index">
	<h2><?php echo __('Extra Activities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('act_category_description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($extraActivities as $extraActivity): ?>
	<tr>
		<td><?php echo h($extraActivity['ExtraActivity']['id']); ?>&nbsp;</td>
		<td><?php echo h($extraActivity['ExtraActivity']['name']); ?>&nbsp;</td>
		<td><?php echo h($extraActivity['ExtraActivity']['act_category_description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $extraActivity['ExtraActivity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $extraActivity['ExtraActivity']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $extraActivity['ExtraActivity']['id']), null, __('Are you sure you want to delete # %s?', $extraActivity['ExtraActivity']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Extra Activity'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Students Extra Activities'), array('controller' => 'students_extra_activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Students Extra Activities'), array('controller' => 'students_extra_activities', 'action' => 'add')); ?> </li>
	</ul>
</div>
