<div class="opportunies view">
<h2><?php  echo __('Opportuny'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($opportuny['Opportuny']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interested Area'); ?></dt>
		<dd>
			<?php echo $this->Html->link($opportuny['InterestedArea']['name'], array('controller' => 'interested_areas', 'action' => 'view', $opportuny['InterestedArea']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($opportuny['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $opportuny['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Batch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($opportuny['Batch']['academic_year'], array('controller' => 'batches', 'action' => 'view', $opportuny['Batch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slots'); ?></dt>
		<dd>
			<?php echo h($opportuny['Opportuny']['slots']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Special Request'); ?></dt>
		<dd>
			<?php echo h($opportuny['Opportuny']['special_request']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Opportuny'), array('action' => 'edit', $opportuny['Opportuny']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Opportuny'), array('action' => 'delete', $opportuny['Opportuny']['id']), null, __('Are you sure you want to delete # %s?', $opportuny['Opportuny']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Opportunies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Opportuny'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Interested Areas'), array('controller' => 'interested_areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interested Area'), array('controller' => 'interested_areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
	</ul>
</div>
