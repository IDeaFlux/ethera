<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'System User List'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New System User'), array('action' => 'add')); ?></li>
        </ul>
    </div>
    <div class="span9">
        <h2><?php echo __('System Users'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('first_name'); ?></th>
                <th><?php echo $this->Paginator->sort('middle_name'); ?></th>
                <th><?php echo $this->Paginator->sort('last_name'); ?></th>
                <th><?php echo $this->Paginator->sort('designation'); ?></th>
                <th><?php echo $this->Paginator->sort('email'); ?></th>
                <th><?php echo $this->Paginator->sort('group_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($systemUsers as $systemUser): ?>
        <tr>
            <td><?php echo h($systemUser['SystemUser']['id']); ?>&nbsp;</td>
            <td><?php echo h($systemUser['SystemUser']['first_name']); ?>&nbsp;</td>
            <td><?php echo h($systemUser['SystemUser']['middle_name']); ?>&nbsp;</td>
            <td><?php echo h($systemUser['SystemUser']['last_name']); ?>&nbsp;</td>
            <td><?php echo h($systemUser['SystemUser']['designation']); ?>&nbsp;</td>
            <td><?php echo h($systemUser['SystemUser']['email']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($systemUser['Group']['name'], array('controller' => 'groups', 'action' => 'view', $systemUser['Group']['id'])); ?>
            </td>
            <td class="actions">
                <div class="btn-group">
                <button class="btn"><?php echo $this->Html->link(__('View'), array('action' => 'view', $systemUser['SystemUser']['id'])); ?></button>
                <button class="btn"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $systemUser['SystemUser']['id'])); ?></button>
                <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $systemUser['SystemUser']['id']), null, __('Are you sure you want to delete # %s?', $systemUser['SystemUser']['id'])); ?></button>
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