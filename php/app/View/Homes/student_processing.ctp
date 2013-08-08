<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Student Processing'); ?>

<h1 align="center">Student Processing</h1>

<div class="container">
    <legend><?php echo __('Basics'); ?></legend>
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-plus icon-4x\"></i></p>
                <p class=\"text-center\">Add Student</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'add'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-list icon-4x\"></i></p>
                <p class=\"text-center\">List Students</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'index'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
    </ul>
</div>
<legend><?php echo __('Approvals'); ?></legend>
<div class="container">
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-frown icon-4x\"></i></p>
                <p class=\"text-center\">Registration Approval</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'reg_approval'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-meh icon-4x\"></i></p>
                <p class=\"text-center\">Initial Approval</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'init_approval'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-smile icon-4x\"></i></p>
                <p class=\"text-center\">Final Approval</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'final_approval'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
    </ul>
</div>
