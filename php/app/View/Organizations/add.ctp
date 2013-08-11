<?php $this->layout = 'bootstrap2'; ?>

<div class="row">

    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?></li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Assignments'), array('controller' => 'assignments', 'action' => 'index')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Opportunies'), array('controller' => 'opportunies', 'action' => 'index')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
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
                echo $this->Form->input('name');
                echo $this->Form->input('address');
                echo $this->Form->input('email');
                echo $this->Form->input('logo',   array('type'=>'file'));
                echo $this->Form->input('profile');
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