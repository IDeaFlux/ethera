<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add Notice'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?></li>
        </ul>
    </div>

    <div class="span9">

        <!-- Start calender script  -->
        <script>
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
            $(function() {
                $("#datespicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        </script>

        <style>
            div.ui-datepicker{
                font-size:10px;
            }
        </style>

        <!-- End the calender script -->

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

            <legend><?php echo __('Add Notice'); ?></legend>
        <?php
            echo $this->Form->input('title',array(
                'class'=>'span6'
            ));
//<!--
//        // Insert date using a calender
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
//
//        // end of the calender
//            echo $this->Form->input('date_start',array(
//                'class'=>'span1'
//            ));
//            echo $this->Form->input('date_end',array(
//                'class'=>'span1'
//            )); -->
        // Insert fields to get start and end time
            echo $this->Form->input('time_start',array(
                'class'=>'span1'
            ));
            echo $this->Form->input('time_end',array(
                'class'=>'span1'
            ));
            echo $this->Form->input('description',array(
                'class'=>'span6'
            ));
            echo $this->Form->input('published_state', array(
                'type' => 'radio',
                'before' => '<label class="control-label">Publish Notice on/off</label>',
                'legend' => false,
                'options' => array(
                    1 => 'on',
                    0 => '0ff'
                ),
                'default'=> 0
            ));
            echo $this->Form->input('publish_to_calendar', array(
            'type' => 'radio',
            'before' => '<label class="control-label">Publish to calendar</label>',
            'legend' => false,
            'options' => array(
                1 => 'on',
                0 => '0ff'
            ),
            'default'=> 0
        ));
           // echo $this->Form->input('system_user');
           // echo $authUser;
            echo $this->Form->input('article_id');


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

<!--<div class="actions">-->
<!--	<h3>--><?php //echo __('Actions'); ?><!--</h3>-->
<!--	<ul>-->
<!---->
<!--		<li>--><?php //echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?><!--</li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List System Users'), array('controller' => 'system_users', 'action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New System User'), array('controller' => 'system_users', 'action' => 'add')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?><!-- </li>-->
<!--	</ul>-->
<!--</div>-->
