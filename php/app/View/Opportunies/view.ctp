<?php $this->layout = 'bootstrap2';?>
<?php $this->set('title', 'View Opportunities'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Opportunity'), array('action' => 'edit', $opportunity['Opportunity']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Opportunity'), array('action' => 'delete', $opportunity['Opportunity']['id']), null, __('Are you sure you want to delete # %s?', $opportunity['Opportunity']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Opportunities'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Opportunity'), array('action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Interested Areas'), array('controller' => 'interested_areas', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Interested Area'), array('controller' => 'interested_areas', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
    <h2><?php  echo __('Opportunity'); ?></h2>
        <dl class="dl-horizontal">
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($opportunity['Opportunity']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Interested Area'); ?></dt>
            <dd>
                <?php echo $this->Html->link($opportunity['InterestedArea']['name'], array('controller' => 'interested_areas', 'action' => 'view', $opportunity['InterestedArea']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Organization'); ?></dt>
            <dd>
                <?php echo $this->Html->link($opportunity['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $opportunity['Organization']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Batch'); ?></dt>
            <dd>
                <?php echo $this->Html->link($opportunity['Batch']['academic_year'], array('controller' => 'batches', 'action' => 'view', $opportunity['Batch']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Slots'); ?></dt>
            <dd>
                <?php echo h($opportunity['Opportunity']['slots']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Special Request'); ?></dt>
            <dd>
                <?php echo h($opportunity['Opportunity']['special_request']); ?>
                &nbsp;
            </dd>
        </dl>
    </div>
</div>
