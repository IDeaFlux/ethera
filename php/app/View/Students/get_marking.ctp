<?php //debug($courses); ?>

<?php $count = 0;?>
<?php foreach($enrollments as $enrollment): ?>
    <label class="checkbox inline" for="<?php echo $enrollment['CourseUnit']['code'];?>">
        <?php
        echo $this->Form->input('Enrollment.'.$count.'.grade',array('class'=>'span1','type'=>'text','label' => false,'value'=>$enrollment['Enrollment']['grade']));
        //echo $this->Form->input('Enrollment.'.$count.'.course_unit_id',array('type'=>'checkbox','value'=>$enrollment['CourseUnit']['id'],'hiddenField' => false,'label'=>false));
        echo $this->Form->hidden('Enrollment.'.$count.'.id',array('value'=>$enrollment['Enrollment']['id']));
        echo $enrollment['CourseUnit']['code'];

        ?>
    </label>
    <?php
    echo $this->Form->hidden('Enrollment.'.$count.'.student_id',array('value'=>$enrollment['Enrollment']['student_id']));
    $count++;
    ?>
<?php endforeach ?>