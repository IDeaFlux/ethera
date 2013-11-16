<?php
//debug($extra_activities);
//debug($student_extra_activities);
//debug($student);
//?>
<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add My Extra Activities'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><a onclick="goBack()">Back</a></li>
        </ul>
    </div>

    <div class="span9">
        <?php echo $this->Form->create('StudentsExtraActivity',array(
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
        <legend><?php echo 'Extra Activity Marks for '.$student['RegistrationNumHeader']['name'].'/'.$student['Batch']['academic_year'].'/'.$student['Student']['reg_number']; ?></legend>
        <?php
        $count = 0;
        foreach($student_extra_activities as $student_extra_activity):
        ?>
            <legend><span style="font-size: 18px"><?php echo $student_extra_activity['ExtraActivity']['name'];?></span></legend>
            <p><?php echo $student_extra_activity['StudentsExtraActivity']['comment']; ?></p>
            <?php
            echo $this->Form->input(
                'StudentsExtraActivity.'.$count.'.mark',
                array(
                    'type' => 'select',
                    'options' => array(
                        '4.0'=>'A',
                        '3.7'=>'A-',
                        '3.3'=>'B+',
                        '3.0'=>'B',
                        '2.7'=>'B-',
                        '2.3'=>'C+',
                        '2.0'=>'C',
                        '1.7'=>'C-',
                        '1.3'=>'D+',
                        '1.0'=>'D',
                        '0'=>'E'
                    ),
                    'label'=>array(
                        'text'=>'Mark',
                    ),
                    'value'=>$student_extra_activity['StudentsExtraActivity']['mark'],
                    'class'=>'span3'
                )
            );
            echo $this->Form->hidden('StudentsExtraActivity.'.$count.'.id',array('value'=>$student_extra_activity['StudentsExtraActivity']['id']));
            $count++;
            ?>
        <?php endforeach; ?>

        <div class="form-actions">
            <?php echo $this->Form->submit('Update', array(
                'div' => false,
                'class' => 'btn btn-primary'
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
