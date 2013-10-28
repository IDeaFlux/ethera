<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Filter By Academic Performance'); ?>

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
        <legend><?php echo __('Filter By Academic Performance'); ?></legend>
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
        ?>
        <div class="form-actions">
            <button class="btn btn-primary" id="load_courses">Load Courses</button>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>