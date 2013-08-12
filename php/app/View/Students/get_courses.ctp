<?php //debug($courses); ?>

<?php $count = 0;?>
<?php foreach($courses as $course): ?>
    <label class="checkbox inline" for="<?php echo $course['CourseUnit']['code'];?>">
    <?php
    echo $this->Form->input('Enrollment.'.$count.'.course_unit_id',array('type'=>'checkbox','value'=>$course['CourseUnit']['id'],'hiddenField' => false,'label'=>false));
    echo $course['CourseUnit']['code'];
    ?>
    </label>
    <?php
    echo $this->Form->hidden('Enrollment.'.$count.'.student_id',array('value'=>$student_id));
    $count++;
    ?>

<?php endforeach ?>