<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Filter By Academic Performance'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><a onclick="goBack()">Back</a></li>
        </ul>
    </div>
    <div class="span9">
        <?php
        $this->Js->get('#BatchBatchId')->event('click',
            $this->Js->request(array(
                'controller'=>'batches',
                'action'=>'get_study_programs'
            ), array(
                'update'=>'#StudentStudyProgram',
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
        <?php echo $this->Form->create('Student',array(
            'novalidate' => true,
            'action' => 'processing',
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
            <?php echo $this->Form->submit('Load Courses', array(
                'div' => false,
                'class' => 'btn btn-primary',
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<script>
    function goBack()
    {
        window.history.back()
    }
</script>