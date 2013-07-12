<div class="courseUnits view">
<h2><?php  echo __('Course Unit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($courseUnit['CourseUnit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($courseUnit['CourseUnit']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credits'); ?></dt>
		<dd>
			<?php echo h($courseUnit['CourseUnit']['credits']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Level'); ?></dt>
		<dd>
			<?php echo h($courseUnit['CourseUnit']['level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Syllabus'); ?></dt>
		<dd>
			<?php echo h($courseUnit['CourseUnit']['syllabus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseUnit['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $courseUnit['Subject']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course Unit'), array('action' => 'edit', $courseUnit['CourseUnit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course Unit'), array('action' => 'delete', $courseUnit['CourseUnit']['id']), null, __('Are you sure you want to delete # %s?', $courseUnit['CourseUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Course Units'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course Unit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('controller' => 'enrollments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('controller' => 'enrollments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Study Programs'), array('controller' => 'study_programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Enrollments'); ?></h3>
	<?php if (!empty($courseUnit['Enrollment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Course Unit Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($courseUnit['Enrollment'] as $enrollment): ?>
		<tr>
			<td><?php echo $enrollment['course_unit_id']; ?></td>
			<td><?php echo $enrollment['student_id']; ?></td>
			<td><?php echo $enrollment['grade']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enrollments', 'action' => 'view', $enrollment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enrollments', 'action' => 'edit', $enrollment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enrollments', 'action' => 'delete', $enrollment['id']), null, __('Are you sure you want to delete # %s?', $enrollment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Enrollment'), array('controller' => 'enrollments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Study Programs'); ?></h3>
	<?php if (!empty($courseUnit['StudyProgram'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Program Code'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($courseUnit['StudyProgram'] as $studyProgram): ?>
		<tr>
			<td><?php echo $studyProgram['id']; ?></td>
			<td><?php echo $studyProgram['program_code']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'study_programs', 'action' => 'view', $studyProgram['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'study_programs', 'action' => 'edit', $studyProgram['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'study_programs', 'action' => 'delete', $studyProgram['id']), null, __('Are you sure you want to delete # %s?', $studyProgram['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
