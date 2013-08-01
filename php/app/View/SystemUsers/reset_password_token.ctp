<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Reset Password'); ?>

<center>
    <?php
    echo $this->Form->create(array(
        'action' => 'reset_password_token',
        'novalidate' => true,
    ));
    echo $this->Form->hidden('reset_password_token',array('value'=>$token));
    echo $this->Form->input('password');
    echo $this->Form->button('Reset Password', array(
        'type' => 'submit',
        'class' => 'btn btn-primary'
    ));
    echo $this->Form->end();
    ?>
</center>