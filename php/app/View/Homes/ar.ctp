<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Admin Home'); ?>

<h1 align="center">Welcome to ETHERA Admin panel</h1>

<div class="container">
<ul class="thumbnails">
<li class="span2">
    <?php
    $i = "<p class=\"text-center\"><i class=\"icon-male icon-4x\"></i></p>
                <p class=\"text-center\">Student</p>";
    echo $this->Html->link(
        $i,
        array('controller' => 'homes', 'action' => 'student_processing'),
        array(
            'class' => 'thumbnail',
            'escape' => false
        )
    );
    ?>
</li>
<li class="span2">
    <?php
    $i = "<p class=\"text-center\"><i class=\"icon-group icon-4x\"></i></p>
                <p class=\"text-center\">Batches</p>";
    echo $this->Html->link(
        $i,
        array('controller' => 'batches', 'action' => 'index'),
        array(
            'class' => 'thumbnail',
            'escape' => false
        )
    );
    ?>
</li>
<li class="span2">
    <?php
    $i = "<p class=\"text-center\"><i class=\"icon-book icon-4x\"></i></p>
                <p class=\"text-center\">Course Units</p>";
    echo $this->Html->link(
        $i,
        array('controller' => 'course_units', 'action' => 'index'),
        array(
            'class' => 'thumbnail',
            'escape' => false
        )
    );
    ?>
</li>
<li class="span2">
    <?php
    $i = "<p class=\"text-center\"><i class=\"icon-beaker icon-4x\"></i></p>
                <p class=\"text-center\">Subjects</p>";
    echo $this->Html->link(
        $i,
        array('controller' => 'subjects', 'action' => 'index'),
        array(
            'class' => 'thumbnail',
            'escape' => false
        )
    );
    ?>
</li>
<li class="span2">
    <?php
    $i = "<p class=\"text-center\"><i class=\"icon-suitcase icon-4x\"></i></p>
                <p class=\"text-center\">Study Programs</p>";
    echo $this->Html->link(
        $i,
        array('controller' => 'study_programs', 'action' => 'index'),
        array(
            'class' => 'thumbnail',
            'escape' => false
        )
    );
    ?>
</li>
<li class="span2">
    <?php
    $i = "<p class=\"text-center\"><i class=\"icon-file-text icon-4x\"></i></p>
                <p class=\"text-center\">Notices</p>";
    echo $this->Html->link(
        $i,
        array('controller' => 'notices', 'action' => 'index'),
        array(
            'class' => 'thumbnail',
            'escape' => false
        )
    );
    ?>
</li>
<li class="span2">
    <?php
    $i = "<p class=\"text-center\"><i class=\"icon-filter icon-4x\"></i></p>
                <p class=\"text-center\">Filters</p>";
    echo $this->Html->link(
        $i,
        array('controller' => 'homes', 'action' => 'filters'),
        array(
            'class' => 'thumbnail',
            'escape' => false
        )
    );
    ?>
</li>
</ul>
</div>
