<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Update Logo'); ?>
<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><a onclick="goBack()">Back</a></li>
        </ul>
    </div>
    <div class="span9">
        <?php echo $this->Form->create('Organization',array(
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

        <legend><?php echo __('Update Logo'); ?></legend>
        <?php
        echo $this->Form->hidden('id',array('value'=>$organization['Organization']['id']));
        echo $this->Form->input('logo',array('type'=>'file'));
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
<script>
    function goBack()
    {
        window.history.back()
    }
</script>