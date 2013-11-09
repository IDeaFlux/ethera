<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Edit My Profile'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('My Profile'), array('controller' => 'students', 'action' => 'my_profile')); ?></li>
        </ul>
    </div>

    <div class="span9">
        <?php echo $this->Form->create('Student',array(
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

        <legend><?php echo __('Edit My Password'); ?></legend>
        <?php
        echo $this->Form->hidden('id',array('value'=>$id));
        echo $this->Form->input('current_password',array(
            'class' => 'span4',
            'type' => 'password'
        ));
        echo $this->Form->input('new_password',array(
            'class' => 'span4',
            'type' => 'password'
        ));
        echo $this->Form->input('repeat_new_password',array(
            'class' => 'span4',
            'type' => 'password'
        ))
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Update', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
</div>