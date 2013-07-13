<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add Study Program'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Study Programs'), array('action' => 'index')); ?></li>
        </ul>
    </div>

    <div class="span9">
    <?php echo $this->Form->create('StudyProgram',array(
        'inputDefaults' => array(
            'div' => 'control-group',
            'label' => array(
                'class' => 'control-label'
            ),
            'wrapInput' => 'controls'
        ),
        'class' => 'well form-horizontal'
    )); ?>
            <legend><?php echo __('Add Study Program'); ?></legend>
        <?php
            echo $this->Form->input('program_code',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('CourseUnit',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('InterestedArea',array(
                'class' => 'span6'
            ));
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Save', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
    <?php echo $this->Form->end(); ?>
    </div>
</div>
