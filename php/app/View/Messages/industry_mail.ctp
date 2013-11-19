<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Send mail to industry'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('E-mail'), array('controller'=>'Messages','action' => 'email')); ?></li>
            <li><?php echo $this->Html->link(__('Send Mail to Students'), array('controller' => 'Messages', 'action' => 'student_mail')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <?php echo $this->Form->create('Organization',array(
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
        <legend><?php echo ('Send Mail to Industry '); ?> </legend>


        <?php
            echo $this->Form->input('to',array(
            'id'=>'id',
            'options'=>$organizations,
            'class' => 'span6'
        ));
        echo $this->Form->input("subject", array(
            'type'=>'text',
            'class' => 'span6'
        ));
        echo $this->Form->input("message",array(
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
