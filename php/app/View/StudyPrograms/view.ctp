<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Study Program :: '.h($studyProgram['StudyProgram']['program_code'])); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Study Program'), array('action' => 'edit', $studyProgram['StudyProgram']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Study Program'), array('action' => 'delete', $studyProgram['StudyProgram']['id']), null, __('Are you sure you want to delete # %s?', $studyProgram['StudyProgram']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Study Programs'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Study Program'), array('action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="span9">
    <h2><?php  echo __('Study Program'); ?></h2>
        <dl class="dl-horizontal">
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($studyProgram['StudyProgram']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Program Code'); ?></dt>
            <dd>
                <?php echo h($studyProgram['StudyProgram']['program_code']); ?>
                &nbsp;
            </dd>
        </dl>
    </div>
</div>

<hr/>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Course Unit'), array('controller' => 'course_units', 'action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="span9">
        <h3><?php echo __('Related Course Units'); ?></h3>
        <?php if (!empty($studyProgram['CourseUnit'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Name'); ?></th>
            <th><?php echo __('Credits'); ?></th>
            <th><?php echo __('Level'); ?></th>
            <th><?php echo __('Syllabus'); ?></th>
            <th><?php echo __('Subject Id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
            $i = 0;
            foreach ($studyProgram['CourseUnit'] as $courseUnit): ?>
            <tr>
                <td><?php echo $courseUnit['id']; ?></td>
                <td><?php echo $courseUnit['name']; ?></td>
                <td><?php echo $courseUnit['credits']; ?></td>
                <td><?php echo $courseUnit['level']; ?></td>
                <td><?php echo $courseUnit['syllabus']; ?></td>
                <td><?php echo $courseUnit['subject_id']; ?></td>
                <td class="actions">
                    <div class="btn-group">
                        <button class="btn"><?php echo $this->Html->link(__('View'), array('controller' => 'course_units', 'action' => 'view', $courseUnit['id'])); ?></button>
                        <button class="btn"><?php echo $this->Html->link(__('Edit'), array('controller' => 'course_units', 'action' => 'edit', $courseUnit['id'])); ?></button>
                        <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'course_units', 'action' => 'delete', $courseUnit['id']), null, __('Are you sure you want to delete # %s?', $courseUnit['id'])); ?></button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>

<hr/>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Interested Area'), array('controller' => 'interested_areas', 'action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="span9">
        <h3><?php echo __('Related Interested Areas'); ?></h3>
        <?php if (!empty($studyProgram['InterestedArea'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Name'); ?></th>
            <th><?php echo __('Description'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
            $i = 0;
            foreach ($studyProgram['InterestedArea'] as $interestedArea): ?>
            <tr>
                <td><?php echo $interestedArea['id']; ?></td>
                <td><?php echo $interestedArea['name']; ?></td>
                <td><?php echo $interestedArea['description']; ?></td>
                <td class="actions">
                    <div class="btn-group">
                        <button class="btn"><?php echo $this->Html->link(__('View'), array('controller' => 'interested_areas', 'action' => 'view', $interestedArea['id'])); ?></button>
                        <button class="btn"><?php echo $this->Html->link(__('Edit'), array('controller' => 'interested_areas', 'action' => 'edit', $interestedArea['id'])); ?></button>
                        <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'interested_areas', 'action' => 'delete', $interestedArea['id']), null, __('Are you sure you want to delete # %s?', $interestedArea['id'])); ?></button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>