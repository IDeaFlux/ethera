<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add Subject'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked affix">

            <li><?php echo $this->Html->link(__('List Subjects'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Course Units'), array('controller' => 'course_units', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Course Unit'), array('controller' => 'course_units', 'action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="span9">
        <?php echo $this->Form->create('Subject',array(
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
                'wrapInput' => 'controls'
            ),
            'class' => 'well form-horizontal'
        )); ?>
                <legend><?php echo __('Add Subject'); ?></legend>
            <?php
                echo $this->Form->input('name',array(
                    'class' => 'span6'
                ));
                echo $this->Form->input('description', array(
                    'class' => 'span6'
                ));
            ?>
            <div class="form-actions">
                <?php echo $this->Form->submit('Save changes', array(
                    'div' => false,
                    'class' => 'btn btn-primary'
                )); ?>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
