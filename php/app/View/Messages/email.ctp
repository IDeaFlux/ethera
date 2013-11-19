<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Send an Email'); ?>

<h1 align ='center'>Welcome to ETHERA E-mail Service</h1>

<div class="container">
    <legend><?php echo __('Actions'); ?></legend>
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-male icon-4x\"></i></p>
                <p class=\"text-center\">Send Mail to Students</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'Messages', 'action' => 'student_mail'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-building icon-4x\"></i></p>
                <p class=\"text-center\">Send Mail to Industry</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'Messages', 'action' => 'industry_mail'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
     </ul>
</div>


