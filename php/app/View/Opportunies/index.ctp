<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Oppotuny List'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Opportuny'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Interested Areas'), array('controller' => 'interested_areas', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Interested Area'), array('controller' => 'interested_areas', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('interested_area_id'); ?></th>
                <th><?php echo $this->Paginator->sort('organization_id'); ?></th>
                <th><?php echo $this->Paginator->sort('batch_id'); ?></th>
                <th><?php echo $this->Paginator->sort('slots'); ?></th>
                <th><?php echo $this->Paginator->sort('special_request'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($opportunies as $opportuny): ?>
        <tr>
            <td><?php echo h($opportuny['Opportuny']['id']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($opportuny['InterestedArea']['name'], array('controller' => 'interested_areas', 'action' => 'view', $opportuny['InterestedArea']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Html->link($opportuny['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $opportuny['Organization']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Html->link($opportuny['Batch']['academic_year'], array('controller' => 'batches', 'action' => 'view', $opportuny['Batch']['id'])); ?>
            </td>
            <td><?php echo h($opportuny['Opportuny']['slots']); ?>&nbsp;</td>
            <td><?php echo h($opportuny['Opportuny']['special_request']); ?>&nbsp;</td>
            <td class="actions">
                <div class="btn-group">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $opportuny['Opportuny']['id']),array('class' => 'btn')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $opportuny['Opportuny']['id']),array('class' => 'btn')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $opportuny['Opportuny']['id']),array('class' => 'btn'), null, __('Are you sure you want to delete # %s?', $opportuny['Opportuny']['id'])); ?>
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
        <?php
            echo $this->Paginator->pagination(array(
                'div'=>'pagination pagination-centered'
            ));
        ?>
        </div>
    </div>
</div>