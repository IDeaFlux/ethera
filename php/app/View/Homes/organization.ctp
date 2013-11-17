<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Admin Home'); ?>

<h1 align="center">Welcome to ETHERA Admin panel</h1>

<div class="container">
<ul class="thumbnails">
<li class="span2">
    <?php
    $i = "<p class=\"text-center\"><i class=\"icon-male icon-4x\"></i></p>
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
<li class="span2">
    <?php
    $i = "<p class=\"text-center\"><i class=\"icon-flag icon-4x\"></i></p>
                <p class=\"text-center\">Grant Opportunities</p>";
    echo $this->Html->link(
        $i,
        array('controller' => 'opportunities', 'action' => 'index_opp_org',$id),
        array(
            'class' => 'thumbnail',
            'escape' => false
        )
    );
    ?>
</li>
</ul>
</div>
