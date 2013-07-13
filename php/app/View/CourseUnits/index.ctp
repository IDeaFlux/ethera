<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Course Unit List'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Course Unit'), array('action' => 'add')); ?></li>
        </ul>
    </div>
    <div class="span9">
        <h2><?php echo __('Course Units'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('code'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('credits'); ?></th>
                <th><?php echo $this->Paginator->sort('level'); ?></th>
                <th><?php echo $this->Paginator->sort('syllabus'); ?></th>
                <th><?php echo $this->Paginator->sort('subject_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($courseUnits as $courseUnit): ?>
        <tr>
            <td><?php echo h($courseUnit['CourseUnit']['id']); ?>&nbsp;</td>
            <td><?php echo h($courseUnit['CourseUnit']['code']); ?>&nbsp;</td>
            <td><?php echo h($courseUnit['CourseUnit']['name']); ?>&nbsp;</td>
            <td><?php echo h($courseUnit['CourseUnit']['credits']); ?>&nbsp;</td>
            <td><?php echo h($courseUnit['CourseUnit']['level']); ?>&nbsp;</td>
            <td><?php echo h($courseUnit['CourseUnit']['syllabus']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($courseUnit['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $courseUnit['Subject']['id'])); ?>
            </td>
            <td class="actions">
                <div class="btn-group">
                    <button class="btn"><?php echo $this->Html->link(__('View'), array('action' => 'view', $courseUnit['CourseUnit']['id'])); ?></button>
                    <button class="btn"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $courseUnit['CourseUnit']['id'])); ?></button>
                    <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $courseUnit['CourseUnit']['id']), null, __('Are you sure you want to delete # %s?', $courseUnit['CourseUnit']['id'])); ?></button>
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