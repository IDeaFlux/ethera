<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Cv');?>

<div class="row">
<div class="span3">
    <ul class="nav nav-tabs nav-stacked">
        <li><?php echo $this->Html->link(__('Edit CV'), array('action' => 'edit', $cv['Cv']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete CV'), array('action' => 'delete', $cv['Cv']['id']), null, __('Are you sure you want to delete # %s?', $cv['Cv']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List CVs'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New CV'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
        <li><?php //echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
    </ul>
</div>

<div class="span9">
<h2><?php  echo __('CV'); ?></h2>
    <dl class="dl-horizontal">
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
</div>


