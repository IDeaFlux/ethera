<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Organization :: '.h($organization['Organization']['id'])); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Organization'), array('action' => 'edit', $organization['Organization']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Organization'), array('action' => 'delete', $organization['Organization']['id']), null, __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
    <h2><?php  echo __('Organization'); ?></h2>
        <dl class="dl-horizontal">
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($organization['Organization']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Name'); ?></dt>
            <dd>
                <?php echo h($organization['Organization']['name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Address'); ?></dt>
            <dd>
                <?php echo h($organization['Organization']['address']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Email'); ?></dt>
            <dd>
                <?php echo h($organization['Organization']['email']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Logo'); ?></dt>
            <dd>
                <?php echo h($organization['Organization']['logo']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Profile'); ?></dt>
            <dd>
                <?php echo h($organization['Organization']['profile']); ?>
                &nbsp;
            </dd>
	</dl>
    </div>
</div>
<hr/>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
        </ul>

    </div>

    <div class="span9">
        <h3><?php echo __('Related Assignments'); ?></h3>
        <?php if (!empty($organization['Assignment'])): ?>
            <table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Interested Area Id'); ?></th>
                <th><?php echo __('Organization Id'); ?></th>
                <th><?php echo __('Student Id'); ?></th>
                <th><?php echo __('Priority'); ?></th>
                <th><?php echo __('State'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
                $i = 0;
                foreach ($organization['Assignment'] as $assignment): ?>
                <tr>
                    <td><?php echo $assignment['id']; ?></td>
                    <td><?php echo $assignment['interested_area_id']; ?></td>
                    <td><?php echo $assignment['organization_id']; ?></td>
                    <td><?php echo $assignment['student_id']; ?></td>
                    <td><?php echo $assignment['priority']; ?></td>
                    <td><?php echo $assignment['state']; ?></td>
                    <td class="actions">
                        <div class="btn-group">
                            <button class="btn"><?php echo $this->Html->link(__('View'), array('controller' => 'assignments', 'action' => 'view', $assignment['id'])); ?></button>
                            <button class="btn"><?php echo $this->Html->link(__('Edit'), array('controller' => 'assignments', 'action' => 'edit', $assignment['id'])); ?></button>
                            <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'assignments', 'action' => 'delete', $assignment['id']), null, __('Are you sure you want to delete # %s?', $assignment['id'])); ?></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <div class="span3">
         <ul class="nav nav-tabs nav-stacked">
             <li><?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?></li>
         </ul>
    </div>

    <div class="span9">
        <h3><?php echo __('Related Feedbacks'); ?></h3>
        <?php if (!empty($organization['Feedback'])): ?>
            <table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Content'); ?></th>
                <th><?php echo __('Student Id'); ?></th>
                <th><?php echo __('Organization Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
                $i = 0;
                foreach ($organization['Feedback'] as $feedback): ?>
                <tr>
                    <td><?php echo $feedback['id']; ?></td>
                    <td><?php echo $feedback['date']; ?></td>
                    <td><?php echo $feedback['content']; ?></td>
                    <td><?php echo $feedback['student_id']; ?></td>
                    <td><?php echo $feedback['organization_id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'feedbacks', 'action' => 'view', $feedback['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'feedbacks', 'action' => 'edit', $feedback['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'feedbacks', 'action' => 'delete', $feedback['id']), null, __('Are you sure you want to delete # %s?', $feedback['id'])); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Opportunity'), array('controller' => 'opportunities', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <h3><?php echo __('Related Opportunities'); ?></h3>
        <?php if (!empty($organization['Opportunity'])): ?>
            <table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Interested Area Id'); ?></th>
                <th><?php echo __('Organization Id'); ?></th>
                <th><?php echo __('Batch Id'); ?></th>
                <th><?php echo __('Slots'); ?></th>
                <th><?php echo __('Special Request'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
                $i = 0;
                foreach ($organization['Opportunity'] as $opportunity): ?>
                <tr>
                    <td><?php echo $opportunity['id']; ?></td>
                    <td><?php echo $opportunity['interested_area_id']; ?></td>
                    <td><?php echo $opportunity['organization_id']; ?></td>
                    <td><?php echo $opportunity['batch_id']; ?></td>
                    <td><?php echo $opportunity['slots']; ?></td>
                    <td><?php echo $opportunity['special_request']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'opportunities', 'action' => 'view', $opportunity['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'opportunities', 'action' => 'edit', $opportunity['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'opportunities', 'action' => 'delete', $opportunity['id']), null, __('Are you sure you want to delete # %s?', $opportunity['id'])); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
