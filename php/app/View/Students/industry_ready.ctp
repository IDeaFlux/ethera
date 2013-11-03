<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Public Readiness Selection'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Students'), array('controller' => 'homes','action' => 'student_processing')); ?></li>
        </ul>
    </div>
    <div class="span9">
        <?php
        $this->Js->get('#BatchBatchId')->event('click',
            $this->Js->request(array(
                'controller'=>'batches',
                'action'=>'get_study_programs'
            ), array(
                'update'=>'#BatchStudyProgram',
                'async' => true,
                'method' => 'post',
                'dataExpression'=>true,
                'data'=> $this->Js->serializeForm(array(
                    'isForm' => true,
                    'inline' => true
                ))
            ))
        );
        ?>
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
        <legend><?php echo __('Public Readiness Selection'); ?></legend>
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
        echo $this->Form->input('industry_ready',array(
            'type' => 'select',
            'options'=> array(
                0 => "Not Public Ready",
                1 => "Public Ready"
            ),
            'class' => 'span4',
            'label' => array(
                'text' => 'Public Readiness'
            )
        ));
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Set', array(
                'div' => false,
                'class' => 'btn btn-primary',
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>