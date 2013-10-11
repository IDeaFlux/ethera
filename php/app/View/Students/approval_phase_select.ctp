<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Student Approval Phase Selection'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Students'), array('action' => 'index')); ?></li>
        </ul>
    </div>
    <div class="span9">

        <?php echo $this->Form->create('Batch',array(
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
        <legend><?php echo __('Student Approval Phase Selection'); ?></legend>
        <?php
        echo $this->Form->input('Batch.batch_id',array(
            'type' => 'select',
            'class' => 'span4',
            'label' => array(
                'text' => 'Batch'
            )
        ));
        echo $this->Form->input('study_program',array(
            'type' => 'select',
            'class' => 'span4',
            'label' => array(
                'text' => 'Study Program'
            )
        ));
        echo $this->Form->input('phase',array(
            'type' => 'select',
            'class' => 'span4',
            'label' => array(
                'text' => 'Phase/Stage'
            )
        ));
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Activate Phase', array(
                'div' => false,
                'class' => 'btn btn-primary',
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>