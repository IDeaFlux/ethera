<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Edit Study Program'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StudyProgram.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StudyProgram.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Study Programs'), array('action' => 'index')); ?></li>
        </ul>
    </div>

    <div class="span9">
    <?php echo $this->Form->create('StudyProgram',array(
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
            <legend><?php echo __('Edit Study Program'); ?></legend>
        <?php
            echo $this->Form->input('id');
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
            <?php echo $this->Form->submit('Save Changes', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>

    <?php echo $this->Form->end(); ?>
    </div>
</div>