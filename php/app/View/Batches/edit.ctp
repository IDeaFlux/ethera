<div class="batches form">
<?php echo $this->Form->create('Batch'); ?>
	<fieldset>
		<legend><?php echo __('Edit Batch'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('academic_year');
		echo $this->Form->input('registration_state');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Batches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Opportunies'), array('controller' => 'opportunies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches Study Programs'), array('controller' => 'batches_study_programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batches Study Program'), array('controller' => 'batches_study_programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
