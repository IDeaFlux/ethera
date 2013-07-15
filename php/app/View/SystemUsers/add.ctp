<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add System User'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List System Users'), array('action' => 'index')); ?></li>
        </ul>
    </div>
    <div class="span9">
    <?php echo $this->Form->create('SystemUser',array(
        'novalidate' => true,
        'type'=>'file',
        'inputDefaults' => array(
            'div' => 'control-group',
            'label' => array(
                'class' => 'control-label'
            ),
            'wrapInput' => 'controls'
        ),
        'class' => 'well form-horizontal'
    )); ?>
            <legend><?php echo __('Add System User'); ?></legend>
        <?php
            echo $this->Form->input('first_name',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('middle_name',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('last_name',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('designation',array(
                'class' => 'span4'
            ));
            echo $this->Form->input('phone_home',array(
                'class' => 'span4'
            ));
            echo $this->Form->input('phone_mobile',array(
                'class' => 'span4'
            ));
            echo $this->Form->input('email',array(
                'class' => 'span4'
            ));
            echo $this->Form->input('password',array(
                'class' => 'span4'
            ));
            echo $this->Form->input('photo',array(
                'type' => 'file'
            ));
            echo $this->Form->input('group_id');
            echo $this->Form->input('biography',array(
                'class' => 'span6'
            ));
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Save User', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
    <?php echo $this->Form->end(); ?>
    </div>
</div>