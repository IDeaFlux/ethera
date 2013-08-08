<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Study Program List'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Study Program'), array('action' => 'add')); ?></li>
        </ul>
    </div>

    <div class="span9">
        <h2><?php echo __('Study Programs'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('program_code'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($studyPrograms as $studyProgram): ?>
        <tr>
            <td><?php echo h($studyProgram['StudyProgram']['id']); ?>&nbsp;</td>
            <td><?php echo h($studyProgram['StudyProgram']['program_code']); ?>&nbsp;</td>
            <td class="actions">
                <div class="btn-group">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $studyProgram['StudyProgram']['id']),array('class' => 'btn')); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $studyProgram['StudyProgram']['id']),array('class' => 'btn')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $studyProgram['StudyProgram']['id']), array('class' => 'btn'), __('Are you sure you want to delete # %s?', $studyProgram['StudyProgram']['id'])); ?>
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