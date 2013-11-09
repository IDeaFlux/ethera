<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'My Profile'); ?>
<h1 align="center">My Profile</h1>

<div class="container">
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-male icon-4x\"></i></p>
                <p class=\"text-center\">Edit My Profile</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'edit_my_profile',$student),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-key icon-4x\"></i></p>
                <p class=\"text-center\">Edit My Password</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'edit_my_password',$student),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <?php if($enable == 1): ?>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-folder-open icon-4x\"></i></p>
                <p class=\"text-center\">My CV Data</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'my_cv_data',$student),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <?php endif ?>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-link icon-4x\"></i></p>
                <p class=\"text-center\">My Extra Activities</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'my_extra_activities'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
    </ul>
</div>