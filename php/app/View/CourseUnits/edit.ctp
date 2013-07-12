<div class="courseUnits form">
<?php echo $this->Form->create('CourseUnit'); ?>
	<fieldset>
		<legend><?php echo __('Edit Course Unit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('credits');
		echo $this->Form->input('level');
		echo $this->Form->input('syllabus');
		echo $this->Form->input('subject_id');
		echo $this->Form->input('StudyProgram');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CourseUnit.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CourseUnit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Course Units'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('controller' => 'enrollments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('controller' => 'enrollments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Study Programs'), array('controller' => 'study_programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
