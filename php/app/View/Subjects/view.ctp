<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Subject :: '.h($subject['Subject']['name'])); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Subject'), array('action' => 'edit', $subject['Subject']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Subject'), array('action' => 'delete', $subject['Subject']['id']), null, __('Are you sure you want to delete # %s?', $subject['Subject']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Subjects'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Subject'), array('action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="span9">
    <h2><?php  echo __('Subject'); ?></h2>
        <dl class="dl-horizontal">
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($subject['Subject']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Name'); ?></dt>
            <dd>
                <?php echo h($subject['Subject']['name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Description'); ?></dt>
            <dd>
                <?php echo h($subject['Subject']['description']); ?>
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
        <?php if (!empty($subject['CourseUnit'])): ?>
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
            foreach ($subject['CourseUnit'] as $courseUnit): ?>
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