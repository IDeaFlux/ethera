<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Enroll Students To Courses'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
        </ul>
    </div>
    <div class="span9">
        <?php
        $this->Js->get('#StudentRegistrationNumHeaderId')->event('click',
                $this->Js->request(array(
                'controller'=>'students',
                'action'=>'get_students_by_batch_and_study_prg'
            ), array(
                'update'=>'#StudentRegNumber',
                'async' => true,
                'method' => 'post',
                'dataExpression'=>true,
                'data'=>'$(\'#StudentRegistrationNumHeaderId,#StudentBatchId\').serializeArray()'),false
            )
        );

        $this->Js->get('#StudentBatchId')->event('change',
            $this->Js->request(array(
                    'controller'=>'students',
                    'action'=>'get_students_by_batch_and_study_prg'
                ), array(
                    'update'=>'#StudentRegNumber',
                    'async' => true,
                    'method' => 'post',
                    'dataExpression'=>true,
                    'data'=>'$(\'#StudentRegistrationNumHeaderId,#StudentBatchId\').serializeArray()'),false
            )
        );

        $this->Js->get('#load_student')->event('click',
            $this->Js->request(array(
                    'controller'=>'students',
                    'action'=>'get_student_profile'
                ), array(
                    'update'=>'#profile',
                    'async' => true,
                    'method' => 'post',
                    'dataExpression'=>true,
                    'data'=>'$(\'#StudentRegistrationNumHeaderId,#StudentBatchId,#StudentRegNumber\').serializeArray()'),false
            )
        );

        $this->Js->get('#load_enrollments')->event('click',
            $this->Js->request(array(
                    'controller'=>'students',
                    'action'=>'get_courses'
                ), array(
                    'update'=>'#tabs',
                    'async' => true,
                    'method' => 'post',
                    'dataExpression'=>true,
                    'data'=>'$(\'#StudentRegNumber\').serializeArray()'),false
            )
        );
        ?>

        <?php echo $this->Form->create('Student',array(
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
        <legend><?php echo __('Enroll Students To Courses'); ?></legend>
        <div id="profile" class="span4 pull-right" style="position: absolute; margin-left: 450px"></div>
        <?php
        echo $this->Form->input('registration_num_header_id',array(
            'label' => array(
                'text' => 'Registration Number ID'
            )
        ));
        echo $this->Form->input('batch_id');
        echo $this->Form->input('reg_number',array(
            'type' => 'select',
            'class' => 'span1',
            'label' => array(
                'text' => 'Registration Number'
            )
        ));

        ?>
        <button class="btn btn-mini" id="load_student">Load Student</button>
        <button class="btn btn-mini" id="load_enrollments">Load Enrollments</button>
        <div id='tabs'></div>
        <div class="form-actions">
            <?php echo $this->Form->submit('Save Enrollments', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>