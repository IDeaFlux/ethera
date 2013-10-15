<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Edit Cv'); ?>

<div class="row">
<div class="span3">
    <ul class="nav nav-tabs nav-stacked">
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cv.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cv.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List CVs'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
    </ul>
</div>

<div class="span9">
<?php echo $this->Form->create('Cv',array(
    'novalidate' => true,
    'inputDefaults' => array(
        'div' => 'control-group',
        'label' => array(
            'class' => 'control-label'
        ),
        'wrapInput' => 'controls'
    ),
    'class' => 'well form-horizontal'
)); ?>

	<fieldset>
		<legend><?php echo __('Edit CV'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('student_id',array(
            'class' => 'span2'
        ));
		echo $this->Form->input('reviewed_state',array(
            'class' => 'span6'
        ));
		echo $this->Form->input('upload_time',array(
            'class' => 'span2'
        ));
	?>
	</fieldset>
    <div class="form-actions">
        <?php echo $this->Form->submit('Save Changes', array(
            'div' => false,
            'class' => 'btn btn-primary'
        )); ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</div>
<div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>

