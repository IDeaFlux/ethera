<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add/View Feedback for Organizations'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><a onclick="goBack()">Back</a></li>
        </ul>
    </div>
    <div class="span9">
        <?php echo $this->Form->create('Feedback',array(
            'novalidate' => true,
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
                'wrapInput' => 'controls'
            ),
            'class' => 'well form-horizontal'
        )); ?>
        <legend><?php echo __('Add/View Feedback for Organizations'); ?></legend>
        <?php
        echo $this->Form->input('Organization.id',array(
            'type' => 'select',
            'class' => 'span4',
            'options' => $organizations,
            'label' => array(
                'text' => 'Organizations'
            )
        ));
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Go', array(
                'div' => false,
                'class' => 'btn btn-primary',
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