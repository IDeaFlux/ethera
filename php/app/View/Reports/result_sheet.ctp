<?php $this->layout = 'print'; ?>
<?php $this->set('title', 'Results Sheet'); ?>

<div class="row">
    <div class="span12">
        <div class="container text-center">
            <h1>Result Sheet</h1>
        </div>
        <h3><?php echo $student['Student']['full_name'];?></h3>
        <h4><?php echo "B.Sc. ".$student['StudyProgram']['program_code'];?></h4>

        <?php if(!empty($enrollments)): ?>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tr>
                    <th><?php echo __('Course Code'); ?></th>
                    <th><?php echo __('Description'); ?></th>
                    <th><?php echo __('Grade'); ?></th>
                </tr>
                <?php foreach ($enrollments as $enrollment): ?>
                    <tr>
                        <td><?php echo h($enrollment['CourseUnit']['code']); ?>&nbsp;</td>
                        <td><?php echo h($enrollment['CourseUnit']['name']); ?>&nbsp;</td>
                        <td><?php echo h($enrollment['grade']); ?>&nbsp;</td>
                    </tr>
                <?php endforeach; ?>
                <tr style="font-weight: bolder; font-size: 18px">
                    <td></td>
                    <td><?php echo h('GPA'); ?>&nbsp;</td>
                    <td><?php echo h($gpa); ?>&nbsp;</td>
                </tr>
            </table>
        <?php endif;?>
    </div>
</div>