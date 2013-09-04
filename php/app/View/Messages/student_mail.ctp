<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Send mail to students'); ?>

<?php
//$this->paginator->options(array(
//    'evalScripts'=>true,
//    'update'=>'industry_mail',
//    'before'=>$this->js->get('#loading')->effect('fadeIn',array(
//            'speed'=>'fast'
//        )),
//    'complete'=>$this->js->get('#loading')->effect('fadeOut',array(
//        'speed'=>'fast'
//    ))
//
//));
//?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('E-mail'), array('controller'=>'Messages','action' => 'email')); ?></li>
            <li><?php echo $this->Html->link(__('Send Mail to Staff'), array('controller' => 'Messages', 'action' => 'staffMail')); ?> </li>
            <li><?php echo $this->Html->link(__('Send Mail to Industry'), array('controller' => 'Messages', 'action' => 'industryMail')); ?> </li>
        </ul>
    </div>




<?php //echo $this->Form->input('student',array(
//   'label'=> false,
//    'id'=>'id',
//    'options'=>$students
//)); ?>


    <div class="span9">
    <?php echo $this->Form->create(null,array(
        'url' => array('controller'=>'messages','action'=>'email'),
        'inputDefaults' => array(
            'div' => 'control-group',
            'label' => array(
                'class' => 'control-label'
            ),
            'wrapInput' => 'controls'
        ),
        'class' => 'well form-horizontal'
    ));?>
        <legend><?php echo _('Find Students to Send Mail') ?></legend>
    <?php echo $this->Form->input('select_batch',array(
        'class'=>'span4',
        //'label'=> false,
        'id'=>'id',
        'options'=>$batches
    )); ?>

    <?php echo $this->Form->input('select_study_program',array(
        'class'=>'span4',
        //'label'=> false,
        'id'=>'id',
        'options'=>$study_programs
    )); ?>

        <div class="form-actions">
            <?php echo $this->Form->submit('Find Students', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
    <?php echo $this->Form->end()?>




        <?php echo $this->Form->create(null,array(
            'url' => array('controller'=>'messages','action'=>'email'),
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
                'wrapInput' => 'controls'
            ),
            'class' => 'well form-horizontal'
        ));?>

        <legend><?php echo _('Send Mail to Students') ?></legend>




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

<?php //echo $this->js->writeBuffer(); ?>