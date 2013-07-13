<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Subject List'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked affix">
            <li><?php echo $this->Html->link(__('New Batch'), array('action' => 'add')); ?></li>
        </ul>
    </div>
    <div class="span9">
        <h2><?php echo __('Batches'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('academic_year'); ?></th>
                <th><?php echo $this->Paginator->sort('registration_state'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($batches as $batch): ?>
        <tr>
            <td><?php echo h($batch['Batch']['id']); ?>&nbsp;</td>
            <td><?php echo h($batch['Batch']['academic_year']); ?>&nbsp;</td>
            <td><?php echo h($batch['Batch']['registration_state']); ?>&nbsp;</td>
            <td class="actions">
                <div class="btn-group">
                    <button class="btn"><?php echo $this->Html->link(__('View'), array('action' => 'view', $batch['Batch']['id'])); ?></button>
                    <button class="btn"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $batch['Batch']['id'])); ?></button>
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