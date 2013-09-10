<div class="feedbacks view">
<h2><?php  echo __('Feedback'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($feedback['Student']['reg_number'], array('controller' => 'students', 'action' => 'view', $feedback['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($feedback['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $feedback['Organization']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Feedback'), array('action' => 'edit', $feedback['Feedback']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Feedback'), array('action' => 'delete', $feedback['Feedback']['id']), null, __('Are you sure you want to delete # %s?', $feedback['Feedback']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
