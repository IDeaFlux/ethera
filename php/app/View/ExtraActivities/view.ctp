<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Extra Activity'); ?>

<div class="row">
    <div class="span3">

    <ul class="nav nav-tabs nav-stacked">
        <li><?php echo $this->Html->link(__('Edit Extra Activity'), array('action' => 'edit', $extraActivity['ExtraActivity']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Extra Activity'), array('action' => 'delete', $extraActivity['ExtraActivity']['id']), null, __('Are you sure you want to delete # %s?', $extraActivity['ExtraActivity']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Extra Activities'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Extra Activity'), array('action' => 'add')); ?> </li>
        <li><?php //echo $this->Html->link(__('List Students Extra Activities'), array('controller' => 'students_extra_activities', 'action' => 'index')); ?> </li>
        <li><?php //echo $this->Html->link(__('New Students Extra Activities'), array('controller' => 'students_extra_activities', 'action' => 'add')); ?> </li>
    </ul>
</div>

    <div class="span9">
    <h2><?php  echo __('Extra Activity'); ?></h2>

    <dl class="dl-horizontal">

        <dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($extraActivity['ExtraActivity']['id']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($extraActivity['ExtraActivity']['name']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Act Category Description'); ?></dt>
		<dd>
			<?php echo h($extraActivity['ExtraActivity']['act_category_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>

<div class="row">
    <div class="span3">
    <ul class="nav nav-tabs nav-stacked">
        <li><?php //echo $this->Html->link(__('New Students Extra Activities'), array('controller' => 'students_extra_activities', 'action' => 'add')); ?> </li>
    </ul>
</div>

<div class="span9">
	<h3><?php //echo __('Related Students Extra Activities'); ?></h3>
	<?php if (!empty($extraActivity['students_extra_activities'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Extra Activity Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Mark'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>

	<?php
		$i = 0;
		foreach ($extraActivity['students_extra_activities'] as $studentsExtraActivities): ?>
		<tr>
			<td><?php echo $studentsExtraActivities['id']; ?></td>
			<td><?php echo $studentsExtraActivities['extra_activity_id']; ?></td>
			<td><?php echo $studentsExtraActivities['student_id']; ?></td>
			<td><?php echo $studentsExtraActivities['mark']; ?></td>
			<td class="actions">
                <div class="btn-group">
				    <?php echo $this->Html->link(__('View'), array('controller' => 'students_extra_activities', 'action' => 'view', $studentsExtraActivities['id'])); ?>
				    <?php echo $this->Html->link(__('Edit'), array('controller' => 'students_extra_activities', 'action' => 'edit', $studentsExtraActivities['id'])); ?>
				    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'students_extra_activities', 'action' => 'delete', $studentsExtraActivities['id']), null, __('Are you sure you want to delete # %s?', $studentsExtraActivities['id'])); ?>
                </div>
            </td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

</div>
