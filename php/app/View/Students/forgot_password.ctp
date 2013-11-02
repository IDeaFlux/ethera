<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Forgot Password'); ?>

<center>
    <?php
    echo $this->Form->create(array(
        'novalidate' => true,
    ));
    echo $this->Form->input('email');
    echo $this->Form->button('Send Instructions', array(
        'type' => 'submit',
        'class' => 'btn btn-primary'
    ));
    echo $this->Form->end();
    ?>
</center>