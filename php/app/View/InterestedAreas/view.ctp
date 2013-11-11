<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Interested Areas'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Interested Area'), array('action' => 'edit', $interestedArea['InterestedArea']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Interested Area'), array('action' => 'delete', $interestedArea['InterestedArea']['id']), null, __('Are you sure you want to delete # %s?', $interestedArea['InterestedArea']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Interested Areas'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Interested Area'), array('action' => 'add')); ?> </li>
            </ul>
    </div>

    <div class="span9">
    <h2><?php  echo __('Interested Area'); ?></h2>
        <dl class="dl-horizontal">
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($interestedArea['InterestedArea']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Name'); ?></dt>
            <dd>
                <?php echo h($interestedArea['InterestedArea']['name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Description'); ?></dt>
            <dd>
                <?php echo h($interestedArea['InterestedArea']['description']); ?>
                &nbsp;
            </dd>
        </dl>
    </div>
</div>

<hr/>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Opportunity'), array('controller' => 'opportunities', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <h3><?php echo __('Related Opportunities'); ?></h3>
        <?php if (!empty($interestedArea['Opportunity'])): ?>
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
            foreach ($interestedArea['Opportunity'] as $opportunity): ?>
            <tr>
                <td><?php echo $opportunity['id']; ?></td>
                <td><?php echo $opportunity['interested_area_id']; ?></td>
                <td><?php echo $opportunity['organization_id']; ?></td>
                <td><?php echo $opportunity['batch_id']; ?></td>
                <td><?php echo $opportunity['slots']; ?></td>
                <td><?php echo $opportunity['special_request']; ?></td>
                <td class="actions">
                    <div class="btn-group">
                        <button class="btn"><?php echo $this->Html->link(__('View'), array('controller' => 'opportunities', 'action' => 'view', $opportunity['id'])); ?></button>
                        <button class="btn"><?php echo $this->Html->link(__('Edit'), array('controller' => 'opportunities', 'action' => 'edit', $opportunity['id'])); ?></button>
                        <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'opportunities', 'action' => 'delete', $opportunity['id']), null, __('Are you sure you want to delete # %s?', $opportunity['id'])); ?></button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>

<hr/>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <h3><?php echo __('Related Study Programs'); ?></h3>
        <?php if (!empty($interestedArea['StudyProgram'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Program Code'); ?></th>
                <th><?php echo __('Registration Num Header Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
                $i = 0;
                foreach ($interestedArea['StudyProgram'] as $studyProgram): ?>
                <tr>
                    <td><?php echo $studyProgram['id']; ?></td>
                    <td><?php echo $studyProgram['program_code']; ?></td>
                    <td><?php echo $studyProgram['registration_num_header_id']; ?></td>
                    <td class="actions">
                        <div class="btn-group">
                            <button class="btn"><?php echo $this->Html->link(__('View'), array('controller' => 'study_programs', 'action' => 'view', $studyProgram['id'])); ?></button>
                            <button class="btn"><?php echo $this->Html->link(__('Edit'), array('controller' => 'study_programs', 'action' => 'edit', $studyProgram['id'])); ?></button>
                            <button class="btn"> <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'study_programs', 'action' => 'delete', $studyProgram['id']), null, __('Are you sure you want to delete # %s?', $studyProgram['id'])); ?></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>


