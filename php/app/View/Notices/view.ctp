<?php $this->layout = 'bootstrap2'; ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Notice'), array('action' => 'edit', $notice['Notice']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Notice'), array('action' => 'delete', $notice['Notice']['id']), null, __('Are you sure you want to delete # %s?', $notice['Notice']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Notice'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Notice'), array('action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="span9">
    <h2><?php  echo __('Notice'); ?></h2>
        <dl class="dl-horizontal">
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($notice['Notice']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Title'); ?></dt>
            <dd>
                <?php echo h($notice['Notice']['title']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Date Start'); ?></dt>
            <dd>
                <?php echo h($notice['Notice']['date_start']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Date End'); ?></dt>
            <dd>
                <?php echo h($notice['Notice']['date_end']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Description'); ?></dt>
            <dd>
                <?php echo h($notice['Notice']['description']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Published State'); ?></dt>
            <dd>
                <?php echo h($notice['Notice']['published_state']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('System User'); ?></dt>
            <dd>
                <?php echo $this->Html->link($notice['SystemUser']['email'], array('controller' => 'system_users', 'action' => 'view', $notice['SystemUser']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Article Id'); ?></dt>
            <dd>
                <?php echo h($notice['Notice']['article_id']); ?>
                &nbsp;
            </dd>
        </dl>
    </div>
</div>
<!--<div class="actions">-->
<!--	<h3>--><?php //echo __('Actions'); ?><!--</h3>-->
<!--	<ul>-->
<!--		<li>--><?php //echo $this->Html->link(__('Edit Notice'), array('action' => 'edit', $notice['Notice']['id'])); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Form->postLink(__('Delete Notice'), array('action' => 'delete', $notice['Notice']['id']), null, __('Are you sure you want to delete # %s?', $notice['Notice']['id'])); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New Notice'), array('action' => 'add')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List System Users'), array('controller' => 'system_users', 'action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New System User'), array('controller' => 'system_users', 'action' => 'add')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?><!-- </li>-->
<!--		<li>--><?php //echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?><!-- </li>-->
<!--	</ul>-->
<!--</div>-->
<hr/>
<!--<!--<div class="row">-->
<!--    <div class="span3">-->
<!--        <ul class="nav nav-tabs nav-stacked">-->
<!--            <li>--><?php ///*echo $this->Html->link(__('New Articles'), array('controller' => 'articles', 'action' => 'add')); */?><!-- </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--	<div class="span9">-->
<!--		<h3>--><?php ///*echo __('Related Articles'); */?><!--</h3>-->
<!--	--><?php ///*if (!empty($notice['article'])): */?>
<!--		<dl>-->
<!--			<dt>--><?php ///*echo __('Id'); */?><!--</dt>-->
<!--		<dd>-->
<!--	--><?php ///*echo $notice['article']['id']; */?>
<!--&nbsp;</dd>-->
<!--		<dt>--><?php ///*echo __('Title'); */?><!--</dt>-->
<!--		<dd>-->
<!--	--><?php ///*echo $notice['article']['title']; */?>
<!--&nbsp;</dd>-->
<!--		<dt>--><?php ///*echo __('Content'); */?><!--</dt>-->
<!--		<dd>-->
<!--	--><?php ///*echo $notice['article']['content']; */?>
<!--&nbsp;</dd>-->
<!--		<dt>--><?php ///*echo __('Published State'); */?><!--</dt>-->
<!--		<dd>-->
<!--	--><?php ///*echo $notice['article']['published_state']; */?>
<!--&nbsp;</dd>-->
<!--		<dt>--><?php ///*echo __('System User Id'); */?><!--</dt>-->
<!--		<dd>-->
<!--	--><?php ///*echo $notice['article']['system_user_id']; */?>
<!--&nbsp;</dd>-->
<!--		</dl>-->
<!--	--><?php ///*endif; */?>
<!--		<div class="actions">-->
<!--			<ul>-->
<!--				<li>--><?php ///*echo $this->Html->link(__('Edit Article'), array('controller' => 'articles', 'action' => 'edit', $notice['article']['id'])); */?><!--</li>-->
<!--			</ul>-->
<!--		</div>-->
<!--	</div>-->
<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
        </ul>
    </div>
<div class="span9">
    <h3><?php echo __('Related Articles'); ?></h3>
    <?php if (!empty($notice['Article'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Title'); ?></th>
                <th><?php echo __('Published State'); ?></th>
                <th><?php echo __('System User Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($notice['Article'] as $article): ?>
                <tr>
                    <td><?php echo $article['id']; ?></td>
                    <td><?php echo $article['title']; ?></td>
                    <td><?php echo $article['published_state']; ?></td>
                    <td><?php echo $article['system_user_id']; ?></td>
                    <td class="actions">
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id']),array('class' => 'btn')); ?>
                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id']),array('class' => 'btn')); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), array('class' => 'btn'), __('Are you sure you want to delete # %s?', $article['id'])); ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
</div>
