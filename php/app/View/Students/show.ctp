<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Students') ?>
<header class="well" style="">
    <div class="container">
        <h1 style="" class="text-center">List of Students</h1>
    </div>
</header>

<div class="container">
    <div class="span12">
    <ul class="thumbnails">
        <?php foreach($students as $student): ?>
            <li class="span2 thumbnail">
                <?php echo $this->Html->image('../uploads/students/'.$student['Student']['photo'],array('width'=>160,'height'=>160,'style'=>'-webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;')) ?>
                <div style="height: 10px"></div>
                <?php echo $this->Html->link($student['Student']['first_name']." ".$student['Student']['last_name'], array('action' => 'student_profile_router', $student['Student']['id']),array('class'=>"btn btn-primary", 'style'=>"width: 140px; height: 40px; font-size: 15px")); ?>
            </li>
        <?php endforeach; ?>
    </ul>
        </div>
</div>