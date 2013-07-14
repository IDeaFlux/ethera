<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Subject List'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Subject'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Course Units'), array('controller' => 'course_units', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Course Unit'), array('controller' => 'course_units', 'action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="span9">
        <h2><?php echo __('Subjects'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('description'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($subjects as $subject): ?>
        <tr>
            <td><?php echo h($subject['Subject']['id']); ?>&nbsp;</td>
            <td><?php echo h($subject['Subject']['name']); ?>&nbsp;</td>
            <td><?php echo h($subject['Subject']['description']); ?>&nbsp;</td>
            <td class="actions">
                <div class="btn-group">
                    <button class="btn"><?php echo $this->Html->link(__('View'), array('action' => 'view', $subject['Subject']['id'])); ?></button>
                    <button class="btn"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subject['Subject']['id'])); ?></button>
                    <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subject['Subject']['id']), null, __('Are you sure you want to delete # %s?', $subject['Subject']['id'])); ?></button>
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