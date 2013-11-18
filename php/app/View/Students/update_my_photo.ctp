<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Student Registration'); ?>

<div class="row">
    <div class="span12">
        <?php echo $this->Form->create('Student',array(
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

        <legend><?php echo __('Update My Photo'); ?></legend>
        <?php
        echo $this->Form->hidden('id',array('value'=>$student['Student']['id']));
        echo $this->Form->input('photo',array('type'=>'file'));
        ?>
        <span class="span7" style="font-size: 11px">Please try to use an image of size 160px X 160px. If not, the image will be automatically cropped.</span>
        <br />

        <div class="form-actions">
            <?php echo $this->Form->submit('Update', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
