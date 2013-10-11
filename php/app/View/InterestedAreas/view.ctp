<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Interested Areas :: '.h($interestedArea['InteresedArea']['id'])); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Interested Area'), array('action' => 'edit', $interestedArea['InterestedArea']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Interested Area'), array('action' => 'delete', $interestedArea['InterestedArea']['id']), null, __('Are you sure you want to delete # %s?', $interestedArea['InterestedArea']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Interested Areas'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Interested Area'), array('action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Assignments'), array('controller' => 'assignments', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Opportunies'), array('controller' => 'opportunies', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Study Programs'), array('controller' => 'study_programs', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
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

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <h3><?php echo __('Related Assignments'); ?></h3>
        <?php if (!empty($interestedArea['Assignment'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-hover">
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
            foreach ($interestedArea['Assignment'] as $assignment): ?>
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
            <li><?php echo $this->Html->link(__('New Opportuny'), array('controller' => 'opportunies', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <h3><?php echo __('Related Opportunies'); ?></h3>
        <?php if (!empty($interestedArea['Opportuny'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-hover">
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
            foreach ($interestedArea['Opportuny'] as $opportuny): ?>
            <tr>
                <td><?php echo $opportuny['id']; ?></td>
                <td><?php echo $opportuny['interested_area_id']; ?></td>
                <td><?php echo $opportuny['organization_id']; ?></td>
                <td><?php echo $opportuny['batch_id']; ?></td>
                <td><?php echo $opportuny['slots']; ?></td>
                <td><?php echo $opportuny['special_request']; ?></td>
                <td class="actions">
                    <div class="btn-group">
                        <button class="btn"><?php echo $this->Html->link(__('View'), array('controller' => 'opportunies', 'action' => 'view', $opportuny['id'])); ?></button>
                        <button class="btn"><?php echo $this->Html->link(__('Edit'), array('controller' => 'opportunies', 'action' => 'edit', $opportuny['id'])); ?></button>
                        <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'opportunies', 'action' => 'delete', $opportuny['id']), null, __('Are you sure you want to delete # %s?', $opportuny['id'])); ?></button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>

    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Study Program'), array('controller' => 'study_programs', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <h3><?php echo __('Related Study Programs'); ?></h3>
        <?php if (!empty($interestedArea['StudyProgram'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-hover">
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