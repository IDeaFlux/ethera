<div class="enrollments form">
<?php echo $this->Form->create('Enrollment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Enrollment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('course_unit_id');
		echo $this->Form->input('student_id');
		echo $this->Form->input('grade');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Enrollment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Enrollment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Course Units'), array('controller' => 'course_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course Unit'), array('controller' => 'course_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
