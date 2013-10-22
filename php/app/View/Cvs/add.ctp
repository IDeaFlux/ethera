<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add CVs'); ?>

<div class="row">
    <div class="span3">
     <ul class="nav nav-tabs nav-stacked">
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

		<legend><?php echo __('Add CV'); ?></legend>
	<?php
		echo $this->Form->input('student_id',array(
            'class' => 'span2'
        ));
		echo $this->Form->input('reviewed_state',array(
            'class' => 'span6'
        ));
        echo $this->Form->input('cv',$options = array('type'=>'file'));
//		echo $this->Form->input('upload_time',array(
//            'class' => 'span2'
//        ));
	?>


    <div class="form-actions">
        <?php echo $this->Form->submit('Save', array(
            'div' => false,
            'class' => 'btn btn-primary'
        )); ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</div
	<h3><?php //echo __('Actions'); ?></h3>

