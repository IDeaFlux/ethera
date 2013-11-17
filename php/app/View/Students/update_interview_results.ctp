<?php
$assignments = $student['Assignment'];
?>
<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Update Interview Results'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><a onclick="goBack()">Back</a></li>
        </ul>
    </div>
    <div class="span9">
        <?php foreach($assignments as $assignment): ?>
        <?php if($assignment['state']==3||$assignment['state']==4||$assignment['state']==8): ?>

        <?php echo $this->Form->create('Students',array(
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
        <legend><?php echo __('Interview for '.$assignment['InterestedArea']['name'].' at '.$assignment['Organization']['name']); ?></legend>
        <?php
        echo $this->Form->input("Assignment.state",array(
            'type' => 'select',
            'options' => array(
                3 => 'Not Yet Faced Interview',
                4 => 'Passed Interview & Pending Job/Internship',
                8 => 'Not passed Interview'
            ),
            'class' => 'span4',
            'value' => $assignment['state'],
            'label' => array(
                'text' => 'Interview Status'
            )
        ));

        echo $this->Form->hidden("Assignment.id",array('value' => $assignment['id']));
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Update', array(
                'div' => false,
                'class' => 'btn btn-primary',
            )); ?>
        </div>
        <?php echo $this->Form->end(); ?>

        <?php endif; ?>
        <?php endforeach;?>
    </div>
</div>
<script>
    function goBack()
    {
        window.history.back()
    }
</script>
