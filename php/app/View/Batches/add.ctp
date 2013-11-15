<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add Batch'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Batches'), array('action' => 'index')); ?></li>
        </ul>
    </div>

    <div class="span9">
    <?php echo $this->Form->create('Batch',array(
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
        <legend><?php echo __('Add Batch'); ?></legend>
        <?php
            echo $this->Form->input('academic_year',array(
            'class' => 'span6'
        ));
            echo $this->Form->input('registration_state', array(
            'type' => 'radio',
            'before' => '<label class="control-label">Registration on/off</label>',
            'legend' => false,
            'options' => array(
                1 => 'On',
                0 => 'Off'
            ),
            'default' => 0
        ));
        echo $this->Form->input('BatchesStudyProgram.study_program_id',array(
            'type' => 'select',
            'multiple' => true,
            'options' => $study_programs,
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
