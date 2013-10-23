<?php if(!empty($courses)) : ?>
<?php $count = 0;?>
<?php foreach($courses as $course): ?>
    <label class="checkbox inline" for="<?php echo $course['CourseUnit']['code'];?>">
    <?php
    foreach($enrollments as $enrollment){
        if($course['CourseUnit']['id']==$enrollment['Enrollment']['course_unit_id']){
            $checked = true;
            break;
        }
        else{
            $checked = false;
        }
    }
    if(!empty($checked)){
        if($checked == true){
            echo $this->Form->input('Enrollment.'.$count.'.course_unit_id',array('type'=>'checkbox','checked'=>true,'value'=>$course['CourseUnit']['id'],'hiddenField' => false,'label'=>false));
            echo $this->Form->hidden('Enrollment.'.$count.'.id',array('value'=>$enrollment['Enrollment']['id']));
        }
        else{
            echo $this->Form->input('Enrollment.'.$count.'.course_unit_id',array('type'=>'checkbox','value'=>$course['CourseUnit']['id'],'hiddenField' => false,'label'=>false));
        }
    }
    else{
        echo $this->Form->input('Enrollment.'.$count.'.course_unit_id',array('type'=>'checkbox','value'=>$course['CourseUnit']['id'],'hiddenField' => false,'label'=>false));
    }
    echo $course['CourseUnit']['code'];
    ?>
    </label>
    <?php
    echo $this->Form->hidden('Enrollment.'.$count.'.student_id',array('value'=>$student_id));
    $count++;
    ?>

<?php endforeach ?>
<?php endif;?>