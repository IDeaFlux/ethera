<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'My CV Data'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('My Profile'), array('controller' => 'students', 'action' => 'my_profile')); ?></li>
        </ul>
    </div>
    <div class="span9">

        <?php echo $this->Form->create('Assignment',array(
            'novalidate' => true,
            'type'=>'file',
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
                'wrapInput' => 'controls'
            ),
            'class' => 'well form-horizontal'
        )); ?>
        <legend><?php echo __('Add My CV Data'); ?></legend>
        <legend><?php echo __('<span style="font-size: 18px">Priority #1</span>'); ?></legend>
        <?php
        echo $this->Form->input('Assignment.0.interested_area_id',array(
            'type' => 'select',
            'options' => $interested_areas,
            'empty' => '(choose one)',
            'class' => 'span4',
            'label' => array(
                'text' => 'Interested Area'
            )
        ));
        ?>
        <legend><?php echo __('<span style="font-size: 18px">Priority #2</span>'); ?></legend>
        <?php
        echo $this->Form->input('Assignment.1.interested_area_id',array(
            'type' => 'select',
            'options' => $interested_areas,
            'empty' => '(choose one)',
            'class' => 'span4',
            'label' => array(
                'text' => 'Interested Area'
            )
        ));
        ?>
        <legend><?php echo __('<span style="font-size: 18px">Priority #3</span>'); ?></legend>
        <?php
        echo $this->Form->input('Assignment.2.interested_area_id',array(
            'type' => 'select',
            'options' => $interested_areas,
            'empty' => '(choose one)',
            'class' => 'span4',
            'label' => array(
                'text' => 'Interested Area'
            )
        ));
        ?>
        <legend><?php echo __('<span style="font-size: 18px">CV Uploading</span>'); ?></legend>
        <?php
        echo $this->Form->input('Cv.cv',
            array(
                'type'=>'file',
                'accept'=>'application/pdf',
                'label' => array(
                    'text' => 'Upload your CV'
                )
            ));
        ?>
        <span class="span7" style="font-size: 11px">This system only accepts PDF (*.pdf) files</span>
        <div class="form-actions">
            <?php echo $this->Form->submit('Submit My Choice', array(
                'div' => false,
                'class' => 'btn btn-primary',
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="row">
    <div class="span3">
    </div>
    <div class="span9">
        <div class="well">
            <legend><?php echo __('Your Current Submissions'); ?></legend>
            <table cellpadding="0" cellspacing="0" class="table table-bordered">
                <tr>
                    <th>Priority</th>
                    <th>Interested Area</th>
                </tr>
                <?php foreach($current_submissions as $current_submission): ?>
                    <tr>
                        <td><?php echo $current_submission['priority']?></td>
                        <td><?php echo $current_submission['name']?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
</div>