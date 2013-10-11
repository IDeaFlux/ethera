<?php $this->layout='bootstrap2';?>
<?php $this->set('title','Add Feedback')?>

<div class="row">

    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <?php echo $this->Form->create('Feedback',array(
            'novalidate'=>true,
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
                'wrapInput' => 'controls'
            ),
            'class' => 'well form-horizontal'
        )); ?>

            <legend><?php echo __('Add Feedback'); ?></legend>

                <?php
                    echo $this->Form->input('date', array('class'=>'span2'));
                    echo $this->Form->input('content', array('class'=>'span5'));
                    echo $this->Form->input('student_id', array('class'=>'span5'));
                    echo $this->Form->input('organization_id', array('class'=>'span5'));
                ?>

        <div class="form-actions">
            <?php echo $this->Form->submit('Save Changes', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
</div>