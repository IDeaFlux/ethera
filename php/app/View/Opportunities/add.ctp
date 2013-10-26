<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add Opportunity'); ?>
<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">

            <li><?php echo $this->Html->link(__('List Opportunities'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Interested Areas'), array('controller' => 'interested_areas', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Interested Area'), array('controller' => 'interested_areas', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <?php echo $this->Form->create('Opportunity', array(
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
            <fieldset>
                <legend><?php echo __('Add Opportunity'); ?></legend>
            <?php
                echo $this->Form->input('interested_area_id');
                echo $this->Form->input('organization_id');
                echo $this->Form->input('batch_id');
                echo $this->Form->input('slots');
                echo $this->Form->input('special_request');
            ?>
            </fieldset>
            <div class="form-actions">
                <?php echo $this->Form->submit('Save', array(
                    'div' => false,
                    'class' => 'btn btn-primary'
                )); ?>
            </div>

        <?php echo $this->Form->end(); ?>
    </div>
</div>