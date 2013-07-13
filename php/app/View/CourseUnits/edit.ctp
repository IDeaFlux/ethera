<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Edit Course Unit'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CourseUnit.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CourseUnit.id'))); ?></li>
            <li><?php echo $this->Html->link(__('New Course Unit'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Course Units'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
    <?php echo $this->Form->create('CourseUnit',array(
        'inputDefaults' => array(
            'div' => 'control-group',
            'label' => array(
                'class' => 'control-label'
            ),
            'wrapInput' => 'controls'
        ),
        'class' => 'well form-horizontal'
    )); ?>
            <legend><?php echo __('Edit Course Unit'); ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('code',array(
                'class' => 'span4'
            ));
            echo $this->Form->input('name',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('credits',array(
                'class' => 'span1'
            ));
            echo $this->Form->input('level',array(
                'class' => 'span1'
            ));
            echo $this->Form->input('syllabus',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('subject_id',array(
                'class' => 'span4'
            ));
            echo $this->Form->input('StudyProgram',array(
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


