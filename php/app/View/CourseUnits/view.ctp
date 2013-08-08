<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Course Unit :: '.h($courseUnit['CourseUnit']['code'])); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Course Unit'), array('action' => 'edit', $courseUnit['CourseUnit']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Course Unit'), array('action' => 'delete', $courseUnit['CourseUnit']['id']), null, __('Are you sure you want to delete # %s?', $courseUnit['CourseUnit']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Course Units'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Course Unit'), array('action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
    <h2><?php  echo __('Course Unit'); ?></h2>
        <dl class="dl-horizontal">
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($courseUnit['CourseUnit']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Code'); ?></dt>
            <dd>
                <?php echo h($courseUnit['CourseUnit']['code']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Name'); ?></dt>
            <dd>
                <?php echo h($courseUnit['CourseUnit']['name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Credits'); ?></dt>
            <dd>
                <?php echo h($courseUnit['CourseUnit']['credits']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Level'); ?></dt>
            <dd>
                <?php echo h($courseUnit['CourseUnit']['level']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Syllabus'); ?></dt>
            <dd>
                <?php echo h($courseUnit['CourseUnit']['syllabus']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Subject'); ?></dt>
            <dd>
                <?php echo $this->Html->link($courseUnit['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $courseUnit['Subject']['id'])); ?>
                &nbsp;
            </dd>
        </dl>
    </div>
</div>
<hr/>
<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="span9">
        <h3><?php echo __('Related Study Programs'); ?></h3>
        <?php if (!empty($courseUnit['StudyProgram'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Program Code'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
            $i = 0;
            foreach ($courseUnit['StudyProgram'] as $studyProgram): ?>
            <tr>
                <td><?php echo $studyProgram['id']; ?></td>
                <td><?php echo $studyProgram['program_code']; ?></td>
                <td class="actions">
                    <div class="btn-group">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'study_programs', 'action' => 'view', $studyProgram['id']),array('class' => 'btn')); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'study_programs', 'action' => 'edit', $studyProgram['id']),array('class' => 'btn')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'study_programs', 'action' => 'delete', $studyProgram['id']), array('class' => 'btn'), __('Are you sure you want to delete # %s?', $studyProgram['id'])); ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>