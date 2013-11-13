<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Individual Configuration'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><a onclick="goBack()">Back</a></li>
        </ul>
    </div>
    <div class="span9">
        <?php echo $this->Form->create('Student',array(
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

        <legend><?php echo __('Individual Configuration of '.$student['RegistrationNumHeader']['name'].'/'.$student['Batch']['academic_year'].'/'.$student['Student']['reg_number']); ?></legend>
        <?php
        echo $this->Form->input('freeze_state',array(
            'class' => 'span4',
            'type' => 'select',
            'options' => array(
                0 => 'Unfreeze',
                1 => 'Freeze'
            )
        ));
        echo $this->Form->input('industry_ready',array(
            'class' => 'span4',
            'type' => 'select',
            'label' => array(
                'text' => 'Public Ready'
            ),
            'options' => array(
                0 => 'Ready',
                1 => 'Not-Ready'
            )
        ));
        echo $this->Form->input('approval_phase',array(
            'class' => 'span6',
            'options'=> array(
                0 => "Non (Registered Phase)",
                1 => "Initial Choices (3) with CV",
                2 => "Final Choices (3) with CV and Companies"
            ),
        ));
        echo $this->Form->hidden('Student.id');
        ?>

        <div class="form-actions">
            <?php echo $this->Form->submit('Update', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>

        <button class="btn btn-large" id="load_enrollments" onclick="goBack()">Print Student Profile</button>
        <button class="btn btn-large" id="load_enrollments" onclick="goBack()">Send an Email</button>
    </div>
</div>
<script>
    function goBack()
    {
        window.history.back()
    }
</script>
