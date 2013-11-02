<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Login'); ?>

<center>
<?php
echo $this->Form->create(array(
    'novalidate' => true,
));
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->button('Login', array(
    'type' => 'submit',
    'class' => 'btn btn-primary'
));
echo $this->Form->end();
echo $this->Html->link('Forgot Password',array('controller' => 'students','action'=>'forgot_password'));
?>
</center>