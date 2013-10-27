<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Filters'); ?>

<h1 align="center">Filters</h1>

<div class="container">
    <legend><?php echo __('Student Filters'); ?></legend>
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-filter icon-4x\"></i></p>
                <p class=\"text-center\">Search Students by Name</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'filter_by_name'),
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
                <p class=\"text-center\">Search Students by Registration ID</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'filter_by_id'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
    </ul>
</div>


