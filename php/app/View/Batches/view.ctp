<div class="batches view">
<h2><?php  echo __('Batch'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($batch['Batch']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Academic Year'); ?></dt>
		<dd>
			<?php echo h($batch['Batch']['academic_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registration State'); ?></dt>
		<dd>
			<?php echo h($batch['Batch']['registration_state']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Batch'), array('action' => 'edit', $batch['Batch']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Opportunies'), array('controller' => 'opportunies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches Study Programs'), array('controller' => 'batches_study_programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batches Study Program'), array('controller' => 'batches_study_programs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Opportunies'); ?></h3>
	<?php if (!empty($batch['Opportuny'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Interested Area Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Batch Id'); ?></th>
		<th><?php echo __('Slots'); ?></th>
		<th><?php echo __('Special Request'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($batch['Opportuny'] as $opportuny): ?>
		<tr>
			<td><?php echo $opportuny['id']; ?></td>
			<td><?php echo $opportuny['interested_area_id']; ?></td>
			<td><?php echo $opportuny['organization_id']; ?></td>
			<td><?php echo $opportuny['batch_id']; ?></td>
			<td><?php echo $opportuny['slots']; ?></td>
			<td><?php echo $opportuny['special_request']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'opportunies', 'action' => 'view', $opportuny['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'opportunies', 'action' => 'edit', $opportuny['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'opportunies', 'action' => 'delete', $opportuny['id']), null, __('Are you sure you want to delete # %s?', $opportuny['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Students'); ?></h3>
	<?php if (!empty($batch['Student'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Middle Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Phone Home'); ?></th>
		<th><?php echo __('Phone Mob'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Photo'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Reg Number'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Date Of Birth'); ?></th>
		<th><?php echo __('Address1'); ?></th>
		<th><?php echo __('Address2'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Freez State'); ?></th>
		<th><?php echo __('Industry Ready'); ?></th>
		<th><?php echo __('Approved State'); ?></th>
		<th><?php echo __('Linkedin Ref'); ?></th>
		<th><?php echo __('Study Program Id'); ?></th>
		<th><?php echo __('Batch Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($batch['Student'] as $student): ?>
		<tr>
			<td><?php echo $student['id']; ?></td>
			<td><?php echo $student['first_name']; ?></td>
			<td><?php echo $student['middle_name']; ?></td>
			<td><?php echo $student['last_name']; ?></td>
			<td><?php echo $student['phone_home']; ?></td>
			<td><?php echo $student['phone_mob']; ?></td>
			<td><?php echo $student['email']; ?></td>
			<td><?php echo $student['password']; ?></td>
			<td><?php echo $student['photo']; ?></td>
			<td><?php echo $student['group_id']; ?></td>
			<td><?php echo $student['reg_number']; ?></td>
			<td><?php echo $student['gender']; ?></td>
			<td><?php echo $student['date_of_birth']; ?></td>
			<td><?php echo $student['address1']; ?></td>
			<td><?php echo $student['address2']; ?></td>
			<td><?php echo $student['city']; ?></td>
			<td><?php echo $student['freez_state']; ?></td>
			<td><?php echo $student['industry_ready']; ?></td>
			<td><?php echo $student['approved_state']; ?></td>
			<td><?php echo $student['linkedin_ref']; ?></td>
			<td><?php echo $student['study_program_id']; ?></td>
			<td><?php echo $student['batch_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'students', 'action' => 'view', $student['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'students', 'action' => 'edit', $student['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'students', 'action' => 'delete', $student['id']), null, __('Are you sure you want to delete # %s?', $student['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Batches Study Programs'); ?></h3>
	<?php if (!empty($batch['BatchesStudyProgram'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Batch Id'); ?></th>
		<th><?php echo __('Study Program Id'); ?></th>
		<th><?php echo __('Freez State'); ?></th>
		<th><?php echo __('Industry Ready'); ?></th>
		<th><?php echo __('Approval Phase'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($batch['BatchesStudyProgram'] as $batchesStudyProgram): ?>
		<tr>
			<td><?php echo $batchesStudyProgram['id']; ?></td>
			<td><?php echo $batchesStudyProgram['batch_id']; ?></td>
			<td><?php echo $batchesStudyProgram['study_program_id']; ?></td>
			<td><?php echo $batchesStudyProgram['freez_state']; ?></td>
			<td><?php echo $batchesStudyProgram['industry_ready']; ?></td>
			<td><?php echo $batchesStudyProgram['approval_phase']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'batches_study_programs', 'action' => 'view', $batchesStudyProgram['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'batches_study_programs', 'action' => 'edit', $batchesStudyProgram['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'batches_study_programs', 'action' => 'delete', $batchesStudyProgram['id']), null, __('Are you sure you want to delete # %s?', $batchesStudyProgram['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Batches Study Program'), array('controller' => 'batches_study_programs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
