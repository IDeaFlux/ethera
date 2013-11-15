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

        <?php for($i=1;$i<=3;$i++): ?>

            <?php if(!empty(${'org_list_'.$i}) && !empty(${'current_submissions_p_'.$i})): ?>

            <legend><?php echo "<span style=\"font-size: 18px\">Priority #$i</span>"; echo " ".'<span style="color: blue;">'.${'current_submissions_p_'.$i}['name'].'</span>';?></legend>
            <?php
            echo $this->Form->input("Assignment.$i.organization_id",array(
                'type' => 'select',
                'options' => ${'org_list_'.$i},
                'class' => 'span4',
                'empty' => '(choose one)',
                'label' => array(
                    'text' => 'Organization Preference'
                )
            ));
                echo $this->Form->hidden("Assignment.$i.id",array(
                    'value' => ${'current_submissions_p_'.$i}['id']
                ))
            ?>
            <?php endif ?>
        <?php endfor; ?>
        <span class="span7" style="font-size: 11px">
            If not all you applied "Interested Area(s)" are appearing, that means
            that "Interested Area(s)" not got any slots from companies. If you don't have at least one company to apply, Please make a request through
            <a href="http://help.linkedin.com/app/answers/detail/a_id/87">this link.</a>
                    </span>
        <div class="form-actions">
            <?php echo $this->Form->submit('Submit My Choice', array(
                'div' => false,
                'class' => 'btn btn-primary',
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>
        <?php echo $this->Form->create('Cv',array(
            'novalidate' => true,
            'type'=>'file',
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
                'wrapInput' => 'controls'
            ),
            'class' => 'well form-horizontal',
            'action' => 'upload_cv_init'
        )); ?>
        <legend><?php echo __('<span style="font-size: 18px">CV Uploading</span>'); ?></legend>
        <?php
        echo $this->Form->input('cv',
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
            <?php echo $this->Form->submit('Upload', array(
                'div' => false,
                'class' => 'btn btn-primary',
            ));?>
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
                    <th>Selected Organization</th>
                </tr>
                <?php if(!empty($current_submissions)): ?>
                    <?php foreach($current_submissions as $current_submission): ?>
                        <tr>
                            <td><?php echo $current_submission['priority']?></td>
                            <td><?php echo $current_submission['name']?></td>
                            <td><?php echo $current_submission['organization']?></td>
                        </tr>
                    <?php
                    endforeach;
                endif;
                ?>
            </table>
        </div>
    </div>
</div>