<?php $this->layout = 'bootstrap2'; ?>

<div class="row">

    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Assignments'), array('controller' => 'assignments', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('List Opportunies'), array('controller' => 'opportunies', 'action' => 'index')); ?> </li>
        </ul>

    </div>

    <div class="span9">
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
            <legend><?php echo __('Add Organization'); ?></legend>
        <fieldset>
            <?php
                echo $this->Form->input('name', array('class'=>'span6'));
                echo $this->Form->input('address', array('class'=>'span6'));
                echo $this->Form->input('email', array('class'=>'span6'));
                echo $this->Form->input('logo',   array('type'=>'file'));
                echo $this->Form->input('profile', array('class'=>'span6'));
            ?>
        </fieldset>
        <div class="form-actions">
            <?php echo $this->Form->submit('Save', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>

    </div>
</div>