<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Edit My Profile'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SystemUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SystemUser.id'))); ?></li>
        </ul>
    </div>

    <div class="span9">
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

        <legend><?php echo __('Edit My Profile Details'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('phone_home',array(
            'class' => 'span4'
        ));
        echo $this->Form->input('phone_mobile',array(
            'class' => 'span4'
        ));
        echo $this->Form->input('email',array(
            'class' => 'span4'
        ));
        echo $this->Form->input('gender', array(
            'type' => 'radio',
            'before' => '<label class="control-label">Gender</label>',
            'legend' => false,
            'options' => array(
                'M' => 'Male',
                'F' => 'Female'
            ),
            'default' => 'M'
        ));
        echo $this->Form->input('date_of_birth',array(
            'minYear' => date('Y') - 70,
            'maxYear' => date('Y') - 18,
            'id' => 'datepicker',
            'type' => 'text'
        ));
        echo $this->Form->input('address1',array(
            'class' => 'span6'
        ));
        echo $this->Form->input('address2',array(
            'class' => 'span6'
        ));
        echo $this->Form->input('city',array(
            'class' => 'span6'
        ));
        echo $this->Form->input('linkedin_ref',array(
            'class' => 'span6',
            'label' => array(
                'text' => 'Linkedin Profile <span style="font-style: italic; font-size: 7px">Your Base Name</span>'
            )
        ));
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Save', array(
                'div' => false,
                'class' => 'btn btn-primary'
            )); ?>
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
    <?php //echo debug($this->request->data['SystemUser']);?>
</div>