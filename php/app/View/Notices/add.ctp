<div class="notices form">
<?php echo $this->Form->create('Notice'); ?>
	<fieldset>
		<legend><?php echo __('Add Notice'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('date_start');
		echo $this->Form->input('date_end');
		echo $this->Form->input('description');
		echo $this->Form->input('published_state');
		echo $this->Form->input('system_user_id');
		echo $this->Form->input('article_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List System Users'), array('controller' => 'system_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New System User'), array('controller' => 'system_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
