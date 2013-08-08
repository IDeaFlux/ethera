<div class="organizations form">
<?php echo $this->Form->create('Organization', $option=array('noValidate'=>true)); ?>
	<fieldset>
		<legend><?php echo __('Add Organization'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('email');
		echo $this->Form->input('logo', array('type'=>'file'));
		echo $this->Form->input('profile');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Assignments'), array('controller' => 'assignments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Opportunies'), array('controller' => 'opportunies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
	</ul>
</div>
