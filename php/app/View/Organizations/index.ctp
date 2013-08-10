<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Organization'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?></li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Assignments'), array('controller' => 'assignments', 'action' => 'index')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('List Opportunies'), array('controller' => 'opportunies', 'action' => 'index')); ?> </li>
        </ul>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
        </ul>

    </div>

    <div class="span9">
            <h2><?php echo __('Organizations'); ?></h2>
            <table cellpadding="0" cellspacing="0" class="table table-hover">
            <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                    <th><?php echo $this->Paginator->sort('address'); ?></th>
                    <th><?php echo $this->Paginator->sort('email'); ?></th>
                    <th><?php echo $this->Paginator->sort('logo'); ?></th>
                    <th><?php echo $this->Paginator->sort('profile'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($organizations as $organization): ?>
            <tr>
                <td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td>
                <td><?php echo h($organization['Organization']['name']); ?>&nbsp;</td>
                <td><?php echo h($organization['Organization']['address']); ?>&nbsp;</td>
                <td><?php echo h($organization['Organization']['email']); ?>&nbsp;</td>
                <td><?php echo h($organization['Organization']['logo']); ?>&nbsp;</td>
                <td><?php echo h($organization['Organization']['profile']); ?>&nbsp;</td>
                <td class="actions">
                    <div class="btn-group">
                        <button class="btn"><?php echo $this->Html->link(__('View'), array('action' => 'view', $organization['Organization']['id'])); ?></button>
                        <button class="btn"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organization['Organization']['id'])); ?></button>
                        <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organization['Organization']['id']), null, __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?></button>
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
