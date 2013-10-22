<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Interested Area'); ?>

<div class="row">

    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Interested Area'), array('action' => 'add')); ?></li>
        </ul>
    </div>

    <div class="span9">
        <h2><?php echo __('Interested Areas'); ?></h2>

        <table cellpadding="0" cellspacing="0" class="table table hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('description'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($interestedAreas as $interestedArea): ?>
        <tr>
            <td><?php echo h($interestedArea['InterestedArea']['id']); ?>&nbsp;</td>
            <td><?php echo h($interestedArea['InterestedArea']['name']); ?>&nbsp;</td>
            <td><?php echo h($interestedArea['InterestedArea']['description']); ?>&nbsp;</td>
            <td class="actions">
                <div class="btn-group">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $interestedArea['InterestedArea']['id']),array('class'=>'btn')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $interestedArea['InterestedArea']['id']),array('class'=>'btn')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $interestedArea['InterestedArea']['id']),array('class' => 'btn'), __('Are you sure you want to delete # %s?', $interestedArea['InterestedArea']['id']),array('class'=>'btn')); ?>
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