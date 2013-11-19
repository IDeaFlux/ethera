<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', "Students of ".$batch['Batch']['academic_year']." ".$study_program['StudyProgram']['program_code']); ?>

<div class="row">
    <div class="span12">
        <h2><?php echo ("Students of ".$batch['Batch']['academic_year']." ".$study_program['StudyProgram']['program_code']); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
            <tr>
                <th><?php echo __('ID'); ?></th>
                <th><?php echo __('Registration Header'); ?></th>
                <th><?php echo __('Batch'); ?></th>
                <th><?php echo __('Registration Number'); ?></th>
                <th><?php echo __('First Name'); ?></th>
                <th><?php echo __('Last Name'); ?></th>
                <th><?php echo __('Study Program'); ?></th>
                <th><?php echo __('Email'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
                    <td><?php echo h($student['RegistrationNumHeader']['name']); ?>&nbsp;</td>
                    <td><?php echo h($student['Batch']['academic_year']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['reg_number']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['first_name']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['last_name']); ?>&nbsp;</td>
                    <td><?php echo h($student['StudyProgram']['program_code']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['email']); ?>&nbsp;</td>
                    <td class="actions">
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View'), array('action' => 'student_profile_router', $student['Student']['id']),array('class' => 'btn')); ?>
                            <?php
                            if(($current_student['group_id']==1) || ($current_student['group_id']==2)){
                                echo $this->Html->link(__('Configurations'), array('action' => 'individual_configuration', $student['Student']['id']),array('class' => 'btn'));
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>