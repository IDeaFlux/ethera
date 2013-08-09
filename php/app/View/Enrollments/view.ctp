<div class="enrollments view">
<h2><?php  echo __('Enrollment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['CourseUnit']['name'], array('controller' => 'course_units', 'action' => 'view', $enrollment['CourseUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['Student']['id'], array('controller' => 'students', 'action' => 'view', $enrollment['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grade'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['grade']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Enrollment'), array('action' => 'edit', $enrollment['Enrollment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Enrollment'), array('action' => 'delete', $enrollment['Enrollment']['id']), null, __('Are you sure you want to delete # %s?', $enrollment['Enrollment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Course Units'), array('controller' => 'course_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course Unit'), array('controller' => 'course_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>

