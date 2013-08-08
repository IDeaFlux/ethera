<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Student Registration'); ?>

<div class="row">
    <div class="span12">
        <script>
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        </script>
        <?php
        $this->Js->get('#StudentRegistrationNumHeaderId')->event('change',
            $this->Js->request(array(
                'controller'=>'study_programs',
                'action'=>'get_by_reg_num_header'
            ), array(
                'update'=>'#StudentStudyProgramId',
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
        <style>
            div.ui-datepicker{
                font-size:10px;
            }
        </style>
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
            <legend><?php echo __('Student Registration'); ?></legend>
            <?php
            echo $this->Form->input('registration_num_header_id');
            echo $this->Form->input('batch_id');
            echo $this->Form->input('reg_number',array(
                'class' => 'span3'
            ));
            echo $this->Form->input('study_program_id');
            echo $this->Form->input('first_name',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('middle_name',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('last_name',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('gender', array(
                'type' => 'radio',
                'before' => '<label class="control-label">Gender</label>',
                'legend' => false,
                'options' => array(
                    'M' => 'Male',
                    'F' => 'Female'
                ),
                'default' => 'M'
            ));
            echo $this->Form->input('date_of_birth',array(
                'minYear' => date('Y') - 70,
                'maxYear' => date('Y') - 18,
                'id' => 'datepicker',
                'type' => 'text'
            ));
            echo $this->Form->input('phone_home',array(
                'class' => 'span4'
            ));
            echo $this->Form->input('phone_mob',array(
                'class' => 'span4'
            ));
            echo $this->Form->input('email',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('password',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('photo',array('type'=>'file'));
            echo $this->Form->input('address1',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('address2',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('city',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('linkedin_ref',array(
                'class' => 'span6'
            ));

            ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Register', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>