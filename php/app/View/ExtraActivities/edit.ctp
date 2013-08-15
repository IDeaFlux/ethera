<div class="extraActivities form">
<?php echo $this->Form->create('ExtraActivity'); ?>
	<fieldset>
		<legend><?php echo __('Edit Extra Activity'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('act_category_description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ExtraActivity.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ExtraActivity.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Extra Activities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Students Extra Activities'), array('controller' => 'students_extra_activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Students Extra Activities'), array('controller' => 'students_extra_activities', 'action' => 'add')); ?> </li>
	</ul>
</div>
