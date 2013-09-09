<div class="cvs view">
<h2><?php  echo __('Cv'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cv['Cv']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cv['Student']['reg_number'], array('controller' => 'students', 'action' => 'view', $cv['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reviewed State'); ?></dt>
		<dd>
			<?php echo h($cv['Cv']['reviewed_state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upload Time'); ?></dt>
		<dd>
			<?php echo h($cv['Cv']['upload_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cv'), array('action' => 'edit', $cv['Cv']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cv'), array('action' => 'delete', $cv['Cv']['id']), null, __('Are you sure you want to delete # %s?', $cv['Cv']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cvs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cv'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
