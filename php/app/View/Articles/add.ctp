<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add Article'); ?>

<?php $this->TinyMCE->editor(array(
    'theme' => 'advanced',
    'mode' => 'textareas',
));?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?></li>
        </ul>
    </div>
    <div class="span9">
    <?php echo $this->Form->create('Article',array(
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
            <legend><?php echo __('Add Article'); ?></legend>
        <?php
            echo $this->Form->input('title',array(
                'class' => 'span6'
            ));
            echo $this->Form->input('content',array(
                'class' => 'span6',
                'rows' => '20'
            ));
            echo $this->Form->input('published_state',array(
                'type' => 'radio',
                'before' => '<label class="control-label">Published State</label>',
                'legend' => false,
                'options' => array(
                    1 => 'Published',
                    0 => 'Unpublished'
                ),
                'default' => 0
            ));
            echo $this->Form->input('system_user_id');
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Save', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>
    <?php echo $this->Form->end(); ?>
    </div>
</div>