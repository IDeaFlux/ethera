<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Notices List'); ?>

<div class="row">
    <div class="span2">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Notice'), array('action' => 'add')); ?></li>
        </ul>
    </div>

    <div class="span10">
        <h2><?php echo __('Notices'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('date_start'); ?></th>
                <th><?php echo $this->Paginator->sort('date_end'); ?></th>
                <!-- <th> --><?php //echo $this->Paginator->sort('description'); ?><!-- </th> -->
                <th><?php echo $this->Paginator->sort('published_state'); ?></th>
                <th><?php echo $this->Paginator->sort('publish_to_calendar'); ?></th>
                <th><?php echo $this->Paginator->sort('system_user_id'); ?></th>
                <th><?php echo $this->Paginator->sort('article_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($notices as $notice): ?>
        <tr>
            <td><?php echo h($notice['Notice']['id']); ?>&nbsp;</td>
            <td><?php echo h($notice['Notice']['title']); ?>&nbsp;</td>
            <td><?php echo h($notice['Notice']['date_start']); ?>&nbsp;</td>
            <td><?php echo h($notice['Notice']['date_end']); ?>&nbsp;</td>
            <!-- <td> --><?php //echo h($notice['Notice']['description']); ?> <!-- </td> -->
             <td><?php echo h($notice['Notice']['published_state']); ?>&nbsp;</td>
            <td><?php echo h($notice['Notice']['publish_to_calendar']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($notice['SystemUser']['email'], array('controller' => 'system_users', 'action' => 'view', $notice['SystemUser']['id'])); ?>
            </td>
            <td><?php echo h($notice['Notice']['article_id']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $notice['Notice']['id']),array('class' => 'btn')); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $notice['Notice']['id']),array('class' => 'btn')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $notice['Notice']['id']),array('class' => 'btn'), __('Are you sure you want to delete # %s?', $notice['Notice']['id'])); ?>
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
    <!--	<div class="paging">-->
    <!--	--><?php
    //		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    //		echo $this->Paginator->numbers(array('separator' => ''));
    //		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    //	?>
    <!--	</div>-->
            <div class="paging">
                <?php echo $this->Paginator->pagination(array(
                    'div' => 'pagination pagination-centered'
                )); ?>
            </div>
      </div>
</div>
<!--<div class="actions">-->
<!--	<h3>--><?php //echo __('Actions'); ?><!--</h3>-->
<!--	<ul>-->
<!--		<li>--><?php //echo $this->Html->link(__('New Notice'), array('action' => 'add')); ?><!--</li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List System Users'), array('controller' => 'system_users', 'action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New System User'), array('controller' => 'system_users', 'action' => 'add')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?><!-- </li>-->
<!--	</ul>-->
<!--</div>-->
