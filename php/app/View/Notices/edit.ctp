<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Edit Notice'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Notice.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Notice.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?></li>
        </ul>
    </div>
    <div class="span9">
        <?php echo $this->Form->create('Notice',array(
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

        <legend><?php echo __('Edit Notice'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title',array(
            'class'=>'span6'
        ));
        //            echo $this->Form->input('start_date',array(
        //                'minYear' => date('Y') - 70,
        //                'maxYear' => date('Y') - 18,
        //                'id' => 'datespicker',
        //                'type' => 'text'
        //            ));
        //            echo $this->Form->input('end_date',array(
        //                'minYear' => date('Y') - 70,
        //                'maxYear' => date('Y') - 18,
        //                'id' => 'datepicker',
        //                'type' => 'text'
        //            ));
        echo $this->Form->input('date_start',array(
            'class'=>'span1',
            'type' => 'datetime',
            'timeFormat'=>'24',
            'dateFormat'=>'YMD',
        ));
        echo $this->Form->input('date_end',array(
            'class'=>'span1',
            'type' => 'datetime',
           'timeFormat'=>'24',
            'dateFormat'=>'YMD',
        ));
        echo $this->Form->input('description',array(
            'class'=>'span6'
        ));
        echo $this->Form->input('published_state', array(
            'type' => 'radio',
            'before' => '<label class="control-label">Publish Notice on/off</label>',
            'legend' => false,
            'options' => array(
                1 => 'On',
                0 => 'Off'
            ),
            'default'=> 0
        ));
        echo $this->Form->input('published_to_cal', array(
            'type' => 'radio',
            'before' => '<label class="control-label">Publish to Calendar</label>',
            'legend' => false,
            'options' => array(
                1 => 'On',
                0 => 'Off'
            ),
            'default'=> 0
        ));
        // echo $this->Form->input('system_user');
        // echo $authUser;
        echo $this->Form->input('article_id');


        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Save Changes', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
</div>
<!--    <div class="actions">-->
<!--        <h3>--><?php //echo __('Actions'); ?><!--</h3>-->
<!--        <ul>-->
<!---->
<!--            <li>--><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Notice.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Notice.id'))); ?><!--</li>-->
<!--            <li>--><?php //echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?><!--</li>-->
<!--            <li>--><?php //echo $this->Html->link(__('List System Users'), array('controller' => 'system_users', 'action' => 'index')); ?><!-- </li>-->
<!--            <li>--><?php //echo $this->Html->link(__('New System User'), array('controller' => 'system_users', 'action' => 'add')); ?><!-- </li>-->
<!--            <li>--><?php //echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?><!-- </li>-->
<!--            <li>--><?php //echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?><!-- </li>-->
<!--        </ul>-->
<!--    </div>-->
