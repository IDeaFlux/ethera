<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Admin Home'); ?>

<h1 align="center">My Profile</h1>

<div class="container">
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-male icon-4x\"></i></p>
                <p class=\"text-center\">Edit My Profile</p>";
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
            $i = "<p class=\"text-center\"><i class=\"icon-user icon-4x\"></i></p>
                <p class=\"text-center\">Edit My Password</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'system_users', 'action' => 'index'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-user icon-4x\"></i></p>
                <p class=\"text-center\">My CV Data</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'system_users', 'action' => 'index'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-user icon-4x\"></i></p>
                <p class=\"text-center\">My Extra Activities</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'system_users', 'action' => 'index'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
    </ul>
</div>
