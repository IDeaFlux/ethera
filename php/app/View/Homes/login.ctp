<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Admin Home'); ?>

<h1 align="center">Choose Login Method</h1>

<div class="container offset3">
    <ul class="thumbnails">
        <li class="span3">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-cogs icon-5x\" style='font-size: 200px'></i></p>
                <p class=\"text-center\">Administrative User</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'system_users', 'action' => 'login'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span3">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-user icon-5x\" style='font-size: 200px'></i></p>
                <p class=\"text-center\">Student</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'login'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
    </ul>
</div>
