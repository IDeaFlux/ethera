<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Edit Organization'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Organization.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Organization.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?></li>
        </ul>
    </div>

    <div class='span9'>
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

        <legend><?php echo __('Edit Organization'); ?></legend>

        <?php
        echo $this->Form->input('name', array('class'=>'span6'));

        echo $this->Form->input('SystemUser.name',array(
            'type' => 'select',
            'options' => $system_users,
            'class' => 'span4',
            'label' => array(
                'text' => 'Related System User Name'
            )
        ));

        echo $this->Form->input('address', array('class'=>'span6'));
        echo $this->Form->input('email', array('class'=>'span6'));
        echo $this->Form->input('logo',   array('type'=>'file'));
        echo $this->Form->input('profile', array('class'=>'span6'));
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
