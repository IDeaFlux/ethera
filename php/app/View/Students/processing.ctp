<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Processing Results'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Back'), array('action' => 'select_processing_set')); ?></li>
        </ul>
    </div>

    <div class="span9">
        <legend><?php echo __('Processing Results'); ?></legend>
        <?php if(!empty($students)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
            <tr>
                <th><?php echo __('Student ID'); ?></th>
                <th><?php echo __('Registration Header'); ?></th>
                <th><?php echo __('Batch'); ?></th>
                <th><?php echo __('Registration Number'); ?></th>
                <th><?php echo __('Study Program'); ?></th>
                <th><?php echo __('Intersected Area'); ?></th>
                <th><?php echo __('Selected Organization'); ?></th>
            </tr>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
                    <td><?php echo h($student['RegistrationNumHeader']['name']); ?>&nbsp;</td>
                    <td><?php echo h($student['Batch']['academic_year']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['reg_number']); ?>&nbsp;</td>
                    <td><?php echo h($student['StudyProgram']['program_code']); ?>&nbsp;</td>
                    <?php
                    $assignments = $student['Assignment'];
                    foreach($assignments as $assignment):?>
                    <?php if($assignment['state']==3): ?>
                            <td><?php echo h($assignment['InterestedArea']['name']); ?>&nbsp;</td>
                            <td><?php echo h($assignment['Organization']['name']); ?>&nbsp;</td>
                    <?php endif;?>
                    <?php endforeach;?>
                </tr>
            <?php endforeach; ?>
        </table>
            <?php else:?>
            <p style="font-style: italic">Sorry. No Students Processed.</p>
        <?php endif;?>
    </div>
</div>