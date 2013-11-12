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
                array('controller' => 'students', 'action' => 'list_students'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
    </ul>
</div>

<div class="container">
    <legend><?php echo __('Evaluations'); ?></legend>
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-check icon-4x\"></i></p>
                <p class=\"text-center\">Enroll Student</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'enroll'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-tasks icon-4x\"></i></p>
                <p class=\"text-center\">Add Marks</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'add_marks'),
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
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-forward icon-4x\"></i></p>
                <p class=\"text-center\">Approval Phase selection</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'approval_phase_select'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-lock icon-4x\"></i></p>
                <p class=\"text-center\">Freeze Unfreeze</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'freeze_unfreeze'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-truck icon-4x\"></i></p>
                <p class=\"text-center\">Public Ready Students</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'industry_ready'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
    </ul>
</div>
