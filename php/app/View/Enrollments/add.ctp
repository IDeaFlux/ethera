<div class="enrollments form">
<?php echo $this->Form->create('Enrollment'); ?>
	<fieldset>
		<legend><?php echo __('Add Enrollment'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Enrollments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Course Units'), array('controller' => 'course_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course Unit'), array('controller' => 'course_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
