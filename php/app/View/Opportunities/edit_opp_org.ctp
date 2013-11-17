<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Grant Opportunity'); ?>
<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">

            <li><?php echo $this->Html->link(__('List My Opportunities'), array('action' => 'index_opp_org',$id)); ?></li>
        </ul>
    </div>
    <?php
    $this->Js->get('#OpportunityBatchId')->event('click',
        $this->Js->request(array(
            'controller'=>'batches',
            'action'=>'get_study_programs_for_opportunities'
        ), array(
            'update'=>'#OpportunityStudyProgramId',
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
    <div class="span9">
        <?php echo $this->Form->create('Opportunity', array(
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
        <fieldset>
            <legend><?php echo __('Add Opportunity'); ?></legend>
            <?php
            echo $this->Form->input('id', array('class'=>'span5'));
            echo $this->Form->input('batch_id',array(
                'type' => 'select',
                'options'=>array($batch),
                'class' => 'span4',
                'label' => array(
                    'text' => 'Batch',
                    'selected'=>0,
                )
            ));
            echo $this->Form->input('study_program_id',array(
                'type' => 'select',
                'class' => 'span4',
                'label' => array(
                    'text' => 'Study Program'
                )
            ));
            echo $this->Form->input('interested_area_id');
            echo $this->Form->input('slots');
            echo $this->Form->input('special_request',array('label'=>array('text'=>'Comment')));
            ?>
        </fieldset>
        <div class="form-actions">
            <?php echo $this->Form->submit('Update', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
</div>