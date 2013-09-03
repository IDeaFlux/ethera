<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Edit Extra Activity'); ?>

<div class="row">
    <div class="span3">
    <h3><?php //echo __('Actions'); ?></h3>
    <ul class="nav nav-tabs nav-stacked">

        <li><?php echo $this->Html->link(__('List Extra Activities'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ExtraActivity.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ExtraActivity.id'))); ?></li>
        <li><?php //echo $this->Html->link(__('List Students Extra Activities'), array('controller' => 'students_extra_activities', 'action' => 'index')); ?> </li>
        <li><?php //echo $this->Html->link(__('New Students Extra Activities'), array('controller' => 'students_extra_activities', 'action' => 'add')); ?> </li>
    </ul>
</div>

<div class="span9">
<?php echo $this->Form->create('ExtraActivity',array(
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
		<legend><?php echo __('Edit Extra Activity'); ?></legend>

	<?php
		echo $this->Form->input('id', array('class'=>'span6'));
		echo $this->Form->input('name', array('class'=>'span6'));
		echo $this->Form->input('act_category_description',array('class'=>'span6','label'=>'Activity Category Description'));
	?>
	</fieldset>

    <div class="form-actions">
        <?php echo $this->Form->submit('Save Changes', array(
            'div' => false,
            'class' => 'btn btn-primary'
        )); ?>
    </div>

<?php //echo $this->Form->end(__('Submit')); ?>
</div>

