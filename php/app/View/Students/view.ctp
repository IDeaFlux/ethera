<?php //$this->layout = 'bootstrap2'; ?>
<?php //$this->set('title', 'View Student :: '.h($student['Student']['name'])); ?>

<div class="students view">
<h2><?php  echo __('Student'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($student['Student']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Middle Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['middle_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Home'); ?></dt>
		<dd>
			<?php echo h($student['Student']['phone_home']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Mob'); ?></dt>
		<dd>
			<?php echo h($student['Student']['phone_mob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($student['Student']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($student['Student']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo h($student['Student']['photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['Group']['name'], array('controller' => 'groups', 'action' => 'view', $student['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reg Number'); ?></dt>
		<dd>
			<?php echo h($student['Student']['reg_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($student['Student']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($student['Student']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($student['Student']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($student['Student']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($student['Student']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Freez State'); ?></dt>
		<dd>
			<?php echo h($student['Student']['freez_state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Industry Ready'); ?></dt>
		<dd>
			<?php echo h($student['Student']['industry_ready']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved State'); ?></dt>
		<dd>
			<?php echo h($student['Student']['approved_state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Linkedin Ref'); ?></dt>
		<dd>
			<?php echo h($student['Student']['linkedin_ref']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Study Program'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['StudyProgram']['program_code'], array('controller' => 'study_programs', 'action' => 'view', $student['StudyProgram']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Batch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['Batch']['academic_year'], array('controller' => 'batches', 'action' => 'view', $student['Batch']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student'), array('action' => 'delete', $student['Student']['id']), null, __('Are you sure you want to delete # %s?', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Study Programs'), array('controller' => 'study_programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Assignments'), array('controller' => 'assignments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cvs'), array('controller' => 'cvs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cv'), array('controller' => 'cvs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('controller' => 'enrollments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('controller' => 'enrollments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Assignments'); ?></h3>
	<?php if (!empty($student['Assignment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Interested Area Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Priority'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($student['Assignment'] as $assignment): ?>
		<tr>
			<td><?php echo $assignment['id']; ?></td>
			<td><?php echo $assignment['interested_area_id']; ?></td>
			<td><?php echo $assignment['organization_id']; ?></td>
			<td><?php echo $assignment['student_id']; ?></td>
			<td><?php echo $assignment['priority']; ?></td>
			<td><?php echo $assignment['state']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'assignments', 'action' => 'view', $assignment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'assignments', 'action' => 'edit', $assignment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'assignments', 'action' => 'delete', $assignment['id']), null, __('Are you sure you want to delete # %s?', $assignment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Cvs'); ?></h3>
	<?php if (!empty($student['Cv'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Reviewed State'); ?></th>
		<th><?php echo __('Upload Time'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($student['Cv'] as $cv): ?>
		<tr>
			<td><?php echo $cv['id']; ?></td>
			<td><?php echo $cv['student_id']; ?></td>
			<td><?php echo $cv['reviewed_state']; ?></td>
			<td><?php echo $cv['upload_time']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cvs', 'action' => 'view', $cv['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cvs', 'action' => 'edit', $cv['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cvs', 'action' => 'delete', $cv['id']), null, __('Are you sure you want to delete # %s?', $cv['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cv'), array('controller' => 'cvs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Enrollments'); ?></h3>
	<?php if (!empty($student['Enrollment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Unit Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($student['Enrollment'] as $enrollment): ?>
		<tr>
			<td><?php echo $enrollment['id']; ?></td>
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
	<h3><?php echo __('Related Feedbacks'); ?></h3>
	<?php if (!empty($student['Feedback'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($student['Feedback'] as $feedback): ?>
		<tr>
			<td><?php echo $feedback['id']; ?></td>
			<td><?php echo $feedback['date']; ?></td>
			<td><?php echo $feedback['content']; ?></td>
			<td><?php echo $feedback['student_id']; ?></td>
			<td><?php echo $feedback['organization_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'feedbacks', 'action' => 'view', $feedback['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'feedbacks', 'action' => 'edit', $feedback['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'feedbacks', 'action' => 'delete', $feedback['id']), null, __('Are you sure you want to delete # %s?', $feedback['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
