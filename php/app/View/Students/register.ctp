<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Student Registration'); ?>

<div class="row">
    <div class="span12">
        <script>
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeYear: true,
                    changeMonth: true,
                    yearRange : 'c-65:c'
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
            //'type'=>'file',
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
            echo $this->Form->input('registration_num_header_id',array(
                'label' => array(
                    'text' => 'Program Code'
                )
            ));
            echo $this->Form->input('batch_id');
            echo $this->Form->input('reg_number',array(
                'class' => 'span3',
                'label' => array(
                    'text' => 'Registration Number'
                )
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
            echo $this->Form->input('full_name',array(
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
                'class' => 'span4',
                'label'=>array(
                    'text'=>"Phone Mobile"
                )
            ));
            echo $this->Form->input('email',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('password',array(
                'class' => 'span6',
                'value' => ''
            ));
            echo $this->Form->input('password_confirmation',array(
                'class' => 'span6',
                'value' => '',
                'type' => 'password'
            ));
            //echo $this->Form->input('photo',array('type'=>'file'));
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
                'class' => 'span6',
                'label' => array(
                    'text' => 'LinkedIn Reference'
                )
            ));
            echo $this->Form->hidden('group_id',array('value'=>4));
            ?>
        <span class="span7" style="font-size: 11px">Use the username part of your LinkedIn public profile URL. If you don't have a public profile username, <a href="http://help.linkedin.com/app/answers/detail/a_id/87">create one</a></span>
        <br />
        <span class="span7" style="font-size: 11px">Example: http://www.linkedin.com/in/<span style="font-weight: bolder">john</span></span>
        <p class="span7" style="font-size: 15px; color:red">The Glowing RED fields are mandatory</p>
        <?php
            echo $this->Recaptcha->display();
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
