<?php //$this->layout = 'bootstrap2'; ?>
<?php //$this->set('title', 'Student List'); ?>

<!--<div class="row">-->
<!--    <div class="span3">-->
<!--        <ul class="nav nav-tabs nav-stacked">-->
<!--            <li>--><?php //echo $this->Html->link(__('New Subject'), array('action' => 'add')); ?><!--</li>-->
<!--            <li>--><?php //echo $this->Html->link(__('List Course Units'), array('controller' => 'course_units', 'action' => 'index')); ?><!-- </li>-->
<!--            <li>--><?php //echo $this->Html->link(__('New Course Unit'), array('controller' => 'course_units', 'action' => 'add')); ?><!-- </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->

<div class="students index">
	<h2><?php echo __('Students'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
<!--			<th>--><?php //echo $this->Paginator->sort('middle_name'); ?><!--</th>-->
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
<!--			<th>--><?php //echo $this->Paginator->sort('phone_home'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('phone_mob'); ?><!--</th>-->
			<th><?php echo $this->Paginator->sort('email'); ?></th>
<!--			<th>--><?php //echo $this->Paginator->sort('password'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('photo'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('group_id'); ?><!--</th>-->
			<th><?php echo $this->Paginator->sort('reg_number'); ?></th>
<!--			<th>--><?php //echo $this->Paginator->sort('gender'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('date_of_birth'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('address1'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('address2'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('city'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('freez_state'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('industry_ready'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('approved_state'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('linkedin_ref'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('study_program_id'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('batch_id'); ?><!--</th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($students as $student): ?>
	<tr>
		<td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['first_name']); ?>&nbsp;</td>
<!--		<td>--><?php //echo h($student['Student']['middle_name']); ?><!--&nbsp;</td>-->
		<td><?php echo h($student['Student']['last_name']); ?>&nbsp;</td>
<!--		<td>--><?php //echo h($student['Student']['phone_home']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['phone_mob']); ?><!--&nbsp;</td>-->
		<td><?php echo h($student['Student']['email']); ?>&nbsp;</td>
<!--		<td>--><?php //echo h($student['Student']['password']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['photo']); ?><!--&nbsp;</td>-->
<!--		<td>-->
<!--			--><?php //echo $this->Html->link($student['Group']['name'], array('controller' => 'groups', 'action' => 'view', $student['Group']['id'])); ?>
<!--		</td>-->
		<td><?php echo h($student['Student']['reg_number']); ?>&nbsp;</td>
<!--		<td>--><?php //echo h($student['Student']['gender']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['date_of_birth']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['address1']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['address2']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['city']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['freez_state']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['industry_ready']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['approved_state']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($student['Student']['linkedin_ref']); ?><!--&nbsp;</td>-->
<!--		<td>-->
<!--			--><?php //echo $this->Html->link($student['StudyProgram']['program_code'], array('controller' => 'study_programs', 'action' => 'view', $student['StudyProgram']['id'])); ?>
<!--		</td>-->
<!--		<td>-->
<!--			--><?php //echo $this->Html->link($student['Batch']['academic_year'], array('controller' => 'batches', 'action' => 'view', $student['Batch']['id'])); ?>
<!--		</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $student['Student']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $student['Student']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $student['Student']['id']), null, __('Are you sure you want to delete # %s?', $student['Student']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Study Programs'), array('controller' => 'study_programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Assignments'), array('controller' => 'assignments', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Cvs'), array('controller' => 'cvs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Cv'), array('controller' => 'cvs', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Enrollments'), array('controller' => 'enrollments', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Enrollment'), array('controller' => 'enrollments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
	</ul>
</div>
