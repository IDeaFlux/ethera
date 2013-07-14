<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Article List'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?></li>
        </ul>
    </div>

    <div class="span9">
        <h2><?php echo __('Articles'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('published_state'); ?></th>
                <th><?php echo $this->Paginator->sort('system_user_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td><?php echo h($article['Article']['id']); ?>&nbsp;</td>
            <td><?php echo h($article['Article']['title']); ?>&nbsp;</td>
            <td><?php echo h($article['Article']['published_state']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($article['SystemUser']['email'], array('controller' => 'system_users', 'action' => 'view', $article['SystemUser']['id'])); ?>
            </td>
            <td class="actions">
                <div class="btn-group">
                    <button class="btn"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $article['Article']['id'])); ?></button>
                    <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $article['Article']['id']), null, __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?></button>
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