<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Feedbacks'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Feedback'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
        </ul>

    </div>

    <div class="span9">
	    <h2><?php echo __('Feedbacks'); ?></h2>

        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('date'); ?></th>
            <th><?php echo $this->Paginator->sort('content'); ?></th>
            <th><?php echo $this->Paginator->sort('student_id'); ?></th>
            <th><?php echo $this->Paginator->sort('organization_id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($feedbacks as $feedback): ?>
        <tr>
            <td><?php echo h($feedback['Feedback']['id']); ?>&nbsp;</td>
            <td><?php echo h($feedback['Feedback']['date']); ?>&nbsp;</td>
            <td><?php echo h($feedback['Feedback']['content']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($feedback['Student']['reg_number'], array('controller' => 'students', 'action' => 'view', $feedback['Student']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Html->link($feedback['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $feedback['Organization']['id'])); ?>
            </td>
            <td class="actions">
                <div class="btn-group">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $feedback['Feedback']['id']),array('class' => 'btn')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $feedback['Feedback']['id']),array('class' => 'btn')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $feedback['Feedback']['id']), null, __('Are you sure you want to delete # %s?', $feedback['Feedback']['id']),array('class' => 'btn')); ?>
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
