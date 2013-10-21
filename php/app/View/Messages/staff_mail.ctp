<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Send mail to staff'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('E-mail'), array('controller'=>'Messages','action' => 'email')); ?></li>
            <li><?php echo $this->Html->link(__('Send Mail to Students'), array('controller' => 'Messages', 'action' => 'student_mail')); ?> </li>
            <li><?php echo $this->Html->link(__('Send Mail to Industry'), array('controller' => 'Messages', 'action' => 'industry_mail')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <?php echo $this->Form->create(null,array(
            'novalidate' => true,
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
                'wrapInput' => 'controls'
            ),
            'class' => 'well form-horizontal'
        ));?>

        <legend><?php echo _('Send Mail to Staff')?> </legend>
    <?php
        echo $this->Form->input("to",array(
            'name'=>'data[to]',
            'type'=>'text',
            'class' => 'span6'
        ));
        echo $this->Form->input("subject", array(
            'name'=>'data[subject]',
            'type'=>'text',
            'class' => 'span6'
        ));
        echo $this->Form->input("message",array(
            'name'=>'data[body]',
            'type'=>'textarea',
            'class'=>'span6'
        ));
        ?>

        <div class="form-actions">
            <?php echo $this->Form->submit('Send Email', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
