<?php $this->layout = 'bootstrap2'?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Interested Areas'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Assignments'), array('controller' => 'assignments', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Opportunies'), array('controller' => 'opportunies', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Study Programs'), array('controller' => 'study_programs', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9"
        <?php echo $this->Form->create('Organization',array(
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

            <legend><?php echo __('Add Interested Area'); ?></legend>

            <?php
              echo $this->Form->input('name',array('class'=>'span5'));
              echo $this->Form->input('description' ,array('class'=>'span5'));
              echo $this->Form->input('StudyProgram',array('class'=>'span5'));
            ?>

        <div class="form-actions">
            <?php echo $this->Form->submit('Save',array(
                'div'=>false,
                'class'=>'btn btn-primary'
            ));
            ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
