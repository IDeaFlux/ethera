<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add Notice'); ?>

<div class="row">
    <div class="span3">
    <h3><?php //echo __('Actions'); ?></h3>
    <ul  class="nav nav-tabs nav-stacked">

        <li><?php echo $this->Html->link(__('List Extra Activities'), array('action' => 'index')); ?></li>
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
    <legend><?php echo __('Add Extra Activity'); ?></legend>

    <fieldset>
    <?php
		echo $this->Form->input('name', array('class'=>'span6'));
		echo $this->Form->input('act_category_description', array('class'=>'span6'));
	?>
	</fieldset>


    <div class="form-actions">
        <?php echo $this->Form->submit('Submit', array(
            'div' => false,
            'class' => 'btn btn-primary'
        )); ?>
    </div>
</div>

