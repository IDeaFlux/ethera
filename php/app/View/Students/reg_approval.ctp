<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Student Registrations to be approved'); ?>

<?php //echo debug($students);?>
<div class="row">
    <div class="span12">
        <h2><?php echo __('Registered Student Approval'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('registration_num_header_id'); ?></th>
                <th><?php echo $this->Paginator->sort('Batch.academic_year'); ?></th>
                <th><?php echo $this->Paginator->sort('reg_number'); ?></th>
                <th><?php echo $this->Paginator->sort('StudyProgram.program_code'); ?></th>
                <th><?php echo $this->Paginator->sort('email'); ?></th>
                <th><?php echo __('Status'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
                    <td><?php echo h($student['RegistrationNumHeader']['name']); ?>&nbsp;</td>
                    <td><?php echo h($student['Batch']['academic_year']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['reg_number']); ?>&nbsp;</td>
                    <td><?php echo h($student['StudyProgram']['program_code']); ?>&nbsp;</td>
                    <td><?php echo h($student['Student']['email']); ?>&nbsp;</td>
                    <td>
                        <?php
                        if($student['Student']['approved_state'] == 0){
                            echo "<span style='color: yellow; font-weight: bold'>Unapproved</span>";
                        }
                        else if($student['Student']['approved_state'] == 9){
                            echo "<span style='color: red; font-weight: bold'>Declined</span>";
                        }
                        ?>
                    </td>
                    <td class="actions">
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View'), array('action' => 'student_profile_router', $student['Student']['id']),array('class' => 'btn')); ?>
                            <?php echo $this->Form->postLink(__('Approve'), array('action' => 'reg_approval_approve', $student['Student']['id']), array('class' => 'btn'), __('Are you want to approve # %s?', $student['Student']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Disapprove'), array('action' => 'reg_approval_disapprove', $student['Student']['id']), array('class' => 'btn'), __('Are you sure you want to disapprove # %s?', $student['Student']['id'])); ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>	</p>
        <div class="paging">
            <?php echo $this->Paginator->pagination(array(
                'div' => 'pagination pagination-centered'
            )); ?>
        </div>
    </div>
</div>