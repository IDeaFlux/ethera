<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Login'); ?>

<?php
echo $this->Form->create('Login',array(
    'novalidate' => true,
    'inputDefaults' => array(
        'div' => 'control-group',
        'label' => array(
            'class' => 'control-label'
        ),
        'wrapInput' => 'controls'
    ),
    'class' => 'well form-horizontal'
));
echo $this->Form->input('email');
echo $this->Form->input('password'); ?>
<div class="form-actions">
            <?php echo $this->Form->submit('Login', array(
    'div' => false,
    'class' => 'btn btn-primary'
)); ?>
</div>
<?php
echo $this->Form->end();
?>