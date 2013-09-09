<div class="cvs form">
<?php echo $this->Form->create('Cv'); ?>
	<fieldset>
		<legend><?php echo __('Add CV'); ?></legend>
	<?php
		echo $this->Form->input('student_id');
		echo $this->Form->input('reviewed_state');
        echo $this->Form->input('cv',$options = array('label'=>'CV','type'=>'file'));
		echo $this->Form->input('upload_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cvs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
