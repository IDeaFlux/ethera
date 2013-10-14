<div class="opportunies form">
<?php echo $this->Form->create('Opportuny'); ?>
	<fieldset>
		<legend><?php echo __('Add Opportuny'); ?></legend>
	<?php
		echo $this->Form->input('interested_area_id');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('batch_id');
		echo $this->Form->input('slots');
		echo $this->Form->input('special_request');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Opportunies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Interested Areas'), array('controller' => 'interested_areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Interested Area'), array('controller' => 'interested_areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
	</ul>
</div>
