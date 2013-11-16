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
            <li><?php echo $this->Html->link(__('My Profile'), array('controller' => 'students', 'action' => 'my_profile')); ?></li>
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
        <legend><?php echo __('Add My Extra Activities'); ?></legend>
        <?php
        $count = 0;
        foreach ($extra_activities as $extra_activity){
            if(!empty($student_extra_activities)){
                $student_extra_activity_true = array();
                foreach($student_extra_activities as $student_extra_activity){
                    if($extra_activity['ExtraActivity']['id'] == $student_extra_activity['StudentsExtraActivity']['extra_activity_id']){
                        $student_extra_activity_true = $student_extra_activity;
                    }
                }
            }

            if(!empty($student_extra_activity_true)){
                echo $this->Form->input(
                    'StudentsExtraActivity.'.$count.'.comment',
                    array(
                        'label'=>array(
                            'text'=>$extra_activity['ExtraActivity']['name'],
                            'id'=>'extra_activity'.$count,
                            'rel'=>'popover',
                            'data-content'=>$extra_activity['ExtraActivity']['act_category_description'],
                            'data-original-title'=>$extra_activity['ExtraActivity']['name']
                        ),
                        'type'=>'textarea',
                        'class'=>'span6',
                        'value'=>$student_extra_activity_true['StudentsExtraActivity']['comment']
                    )
                );
                echo $this->Form->hidden('StudentsExtraActivity.'.$count.'.extra_activity_id',array('value'=>$extra_activity['ExtraActivity']['id']));
                echo $this->Form->hidden('StudentsExtraActivity.'.$count.'.student_id',array('value'=>$student['id']));
                echo $this->Form->hidden('StudentsExtraActivity.'.$count.'.id',array('value'=>$student_extra_activity_true['StudentsExtraActivity']['id']));
            }
            else{
                echo $this->Form->input(
                    'StudentsExtraActivity.'.$count.'.comment',
                    array(
                        'label'=>array(
                            'text'=>$extra_activity['ExtraActivity']['name'],
                            'id'=>'extra_activity'.$count,
                            'rel'=>'popover',
                            'data-content'=>$extra_activity['ExtraActivity']['act_category_description'],
                            'data-original-title'=>$extra_activity['ExtraActivity']['name']
                        ),
                        'type'=>'textarea',
                        'class'=>'span6'
                    )
                );
                echo $this->Form->hidden('StudentsExtraActivity.'.$count.'.extra_activity_id',array('value'=>$extra_activity['ExtraActivity']['id']));
                echo $this->Form->hidden('StudentsExtraActivity.'.$count.'.student_id',array('value'=>$student['id']));
            }
            $count++;
        }
        ?>
        <span class="span7" style="font-size: 11px">
            Please mouse-over to the "Extra Activity" label to know more about what you need to add.
        </span>
        <div class="form-actions">
            <?php echo $this->Form->submit('Save', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<script type="text/javascript">
    $(function ()
    {
        <?php
        for($i=0;$i<$count;$i++):
        ?>
        $("#extra_activity<?php echo $i;?>").popover({trigger: 'hover'});
        <?php endfor; ?>
    });
</script>
