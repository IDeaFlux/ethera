<?php //$this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Send an Email'); ?>

<div class="students index">
    <h2><?php echo __('Email'); ?></h2>
    <!--<div class="row">-->
    <!--    <div class="span3"></div>-->
    <!--    <div class="span9">-->

    <?php
    echo $this->Form->create(null, array(
        'url' => array('controller' => 'messages', 'action' => 'email'),
        'inputDefaults' => array(
            'div' => 'control-group',
            'label' => array(
                'class' => 'control-label'
            ),
            'wrapInput' => 'controls'
        ),
        'class' => 'well form-horizontal'
    ));

    echo $this->Form->input("to",array(
        'name'  => 'data[to]',
        'type' => 'text',
        'class' => 'span6'
    ));

    echo $this->Form->input("subject",array(
        'name'  => 'data[subject]',
        'type' => 'text',
        'class' => 'span6'
    ));

    echo $this->Form->input("message",array(
        'name'  => 'data[body]',
        'type' => 'textarea',
        'class' => 'span6'
    ));?>
    <div class="form-actions">
        <?php echo $this->Form->submit('Send Email', array(
            'div' => false,
            'class' => 'btn btn-primary'
        )); ?>
    </div>


    <?php echo $this->Form->end(); ?>

</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Email'), array('action' => 'email')); ?></li>
        <li><?php echo $this->Html->link(__('Send mail to organizations'), array('action' => 'industryMail')); ?> </li>
        <li><?php echo $this->Html->link(__('Send mail to staff'), array('action' => 'staffMail')); ?> </li>
</div>
