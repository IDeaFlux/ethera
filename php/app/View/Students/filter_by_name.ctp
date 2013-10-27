<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Search Students by Name'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Filters'), array('controller' => 'homes','action' => 'filters')); ?></li>
        </ul>
    </div>
    <div class="span9">
        <?php
        $this->Js->get('#StudentSearch')->event('keyup',
            $this->Js->request(array(
                'controller'=>'students',
                'action'=>'get_students_by_name'
            ), array(
                'update'=>'#results',
                'async' => true,
                'method' => 'post',
                'dataExpression'=>true,
                'data'=> $this->Js->serializeForm(array(
                    'isForm' => true,
                    'inline' => true
                ))
            ))
        );
        ?>
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
        <legend><?php echo __('Search Students by Name'); ?></legend>
        <?php
        echo $this->Form->input('search',array(
            'type' => 'text',
            'class' => 'span4',
            'label' => array(
                'text' => 'Search'
            )
        ));
        ?>
        <span style="font-style: italic">Type a part of Student's name</span>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<div class="row" id="results">
</div>