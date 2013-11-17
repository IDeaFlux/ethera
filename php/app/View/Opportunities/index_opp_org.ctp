<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Opportunity List'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Opportunity'), array('action' => 'add_opp_org',$id)); ?></li>
        </ul>
    </div>

    <div class="span9">
        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('interested_area_id'); ?></th>
                <th><?php echo $this->Paginator->sort('batch_id'); ?></th>
                <th><?php echo $this->Paginator->sort('slots'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($opportunities as $opportunity): ?>
        <tr>
            <td><?php echo h($opportunity['Opportunity']['id']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($opportunity['InterestedArea']['name'], array('controller' => 'interested_areas', 'action' => 'view', $opportunity['InterestedArea']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Html->link($opportunity['Batch']['academic_year'], array('controller' => 'batches', 'action' => 'view', $opportunity['Batch']['id'])); ?>
            </td>
            <td><?php echo h($opportunity['Opportunity']['slots']); ?>&nbsp;</td>
            <td class="actions">
                <div class="btn-group">
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit_opp_org',$id, $opportunity['Opportunity']['id']),array('class' => 'btn')); ?>
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