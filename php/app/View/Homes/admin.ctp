<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Admin Home'); ?>

<h1 align="center">Welcome to ETHERA Admin panel</h1>

<div class="container">
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-user icon-4x\"></i></p>
                <p class=\"text-center\">System Users</p>";
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
            $i = "<p class=\"text-center\"><i class=\"icon-file icon-4x\"></i></p>
                <p class=\"text-center\">Articles</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'articles', 'action' => 'index'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-mobile-phone icon-4x\"></i></p>
                <p class=\"text-center\">Send SMS</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'messages', 'action' => 'sms'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-envelope icon-4x\"></i></p>
                <p class=\"text-center\">Send Email</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'messages', 'action' => 'email'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
    </ul>
</div>
