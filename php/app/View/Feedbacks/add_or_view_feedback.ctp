<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Add/View Feedback for Organizations'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><a onclick="goBack()">Back</a></li>
        </ul>
    </div>
    <div class="span9">
        <div class="text-center">
            <?php echo $this->Html->image('../uploads/organizations/'.$organization['Organization']['logo'],array('width'=>160,'height'=>160,'style'=>'-webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;')) ?>
            <h1><?php echo $organization['Organization']['name']?></h1>
            <h5><?php echo $organization['Organization']['email']?></h5>
        </div>

        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th></th>
                <th></th>
            </tr>
            <?php foreach($feedbacks as $feedback): ?>
                <tr>
                    <td>
                        <div class="span2 thumbnail" style="">
                            <?php echo $this->Html->image('../uploads/students/'.$feedback['Student']['photo'],array('width'=>60,'height'=>60,'style'=>'-webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;')) ?>
                            <div class="text-center">
                                <p style="font-weight: bold; font-size: 15px"><?php echo $feedback['Student']['first_name'];?></p>
                                <p style="font-style: italic; font-size: 8px"><?php echo $feedback['Feedback']['date']; ?></p>
                            </div>
                        </div>
                    </td>
                    <td><p><?php echo $feedback['Feedback']['content']; ?></p></td>
                </tr>
            <?php endforeach; ?>
        </table>


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
        <?php
        echo $this->Form->input('content',array(
            'type' => 'text',
            'class' => 'span7',
            'rows'=>5,
            'label' => array(
                'text' => ''
            )
        ));
        ?>
        <?php echo $this->Form->hidden('organization_id',array('value'=>$organization['Organization']['id'])); ?>
        <div class="form-actions">
            <?php echo $this->Form->submit('Submit Feedback', array(
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