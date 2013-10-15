<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Admin Home'); ?>

<h1 align="center">Welcome to ETHERA Student Control Panel</h1>

<div class="container">
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-male icon-4x\"></i></p>
                <p class=\"text-center\">My Profile</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'my_profile'),
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
                <p class=\"text-center\">Feed-Backs</p>";
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
