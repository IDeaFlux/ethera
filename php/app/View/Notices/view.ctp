<div class="notices view">
<h2><?php  echo __('Notice'); ?></h2>
	<dl>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Notice'), array('action' => 'edit', $notice['Notice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Notice'), array('action' => 'delete', $notice['Notice']['id']), null, __('Are you sure you want to delete # %s?', $notice['Notice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notice'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List System Users'), array('controller' => 'system_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New System User'), array('controller' => 'system_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Articles'); ?></h3>
	<?php if (!empty($notice['article'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $notice['article']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
	<?php echo $notice['article']['title']; ?>
&nbsp;</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
	<?php echo $notice['article']['content']; ?>
&nbsp;</dd>
		<dt><?php echo __('Published State'); ?></dt>
		<dd>
	<?php echo $notice['article']['published_state']; ?>
&nbsp;</dd>
		<dt><?php echo __('System User Id'); ?></dt>
		<dd>
	<?php echo $notice['article']['system_user_id']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Article'), array('controller' => 'articles', 'action' => 'edit', $notice['article']['id'])); ?></li>
			</ul>
		</div>
	</div>
	