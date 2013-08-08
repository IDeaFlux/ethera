<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Send an SMS'); ?>


<div class="row">
    <div class="span3"></div>
    <div class="span9">

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
        ));?>


        <?php echo $this->Form->input("number",array(
            'name'  => 'data[to]',
            'type' => 'text',
            'class' => 'span6'
        ));

        echo $this->Form->input("message",array(
            'name'  => 'data[body]',
            'type' => 'textarea',
            'class' => 'span6'
        ));?>

        <div class="form-actions">
            <?php echo $this->Form->submit('Send SMS', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>



        <?php echo $this->Form->end(); ?>


    </div>
</div>