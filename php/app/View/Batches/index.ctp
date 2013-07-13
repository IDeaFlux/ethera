<div class="batches index">
	<h2><?php echo __('Batches'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('academic_year'); ?></th>
			<th><?php echo $this->Paginator->sort('registration_state'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($batches as $batch): ?>
	<tr>
		<td><?php echo h($batch['Batch']['id']); ?>&nbsp;</td>
		<td><?php echo h($batch['Batch']['academic_year']); ?>&nbsp;</td>
		<td><?php echo h($batch['Batch']['registration_state']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $batch['Batch']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $batch['Batch']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Batch'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Opportunies'), array('controller' => 'opportunies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches Study Programs'), array('controller' => 'batches_study_programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batches Study Program'), array('controller' => 'batches_study_programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
