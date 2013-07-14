<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View System User :: '.h($systemUser['SystemUser']['first_name'])); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit System User'), array('action' => 'edit', $systemUser['SystemUser']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete System User'), array('action' => 'delete', $systemUser['SystemUser']['id']), null, __('Are you sure you want to delete # %s?', $systemUser['SystemUser']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List System Users'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New System User'), array('action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
    <h2><?php  echo __('System User'); ?></h2>

        <?php echo $this->Html->image('../uploads/system_users/'.$systemUser['SystemUser']['photo']) ?>

        <dl class="dl-horizontal">
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($systemUser['SystemUser']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('First Name'); ?></dt>
            <dd>
                <?php echo h($systemUser['SystemUser']['first_name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Middle Name'); ?></dt>
            <dd>
                <?php echo h($systemUser['SystemUser']['middle_name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Last Name'); ?></dt>
            <dd>
                <?php echo h($systemUser['SystemUser']['last_name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Phone Home'); ?></dt>
            <dd>
                <?php echo h($systemUser['SystemUser']['phone_home']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Phone Mobile'); ?></dt>
            <dd>
                <?php echo h($systemUser['SystemUser']['phone_mobile']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Email'); ?></dt>
            <dd>
                <?php echo h($systemUser['SystemUser']['email']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Group'); ?></dt>
            <dd>
                <?php echo $this->Html->link($systemUser['Group']['name'], array('controller' => 'groups', 'action' => 'view', $systemUser['Group']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Biography'); ?></dt>
            <dd>
                <?php echo h($systemUser['SystemUser']['biography']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Designation'); ?></dt>
            <dd>
                <?php echo h($systemUser['SystemUser']['designation']); ?>
                &nbsp;
            </dd>
        </dl>
    </div>
</div>
<hr/>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="span9">
        <h3><?php echo __('Related Articles'); ?></h3>
        <?php if (!empty($systemUser['Article'])): ?>
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
            foreach ($systemUser['Article'] as $article): ?>
            <tr>
                <td><?php echo $article['id']; ?></td>
                <td><?php echo $article['title']; ?></td>
                <td><?php echo $article['published_state']; ?></td>
                <td><?php echo $article['system_user_id']; ?></td>
                <td class="actions">
                    <div class="btn-group">
                        <button class="btn"><?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id'])); ?></button>
                        <button class="btn"><?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?></button>
                        <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), null, __('Are you sure you want to delete # %s?', $article['id'])); ?></button>
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
            <li><?php echo $this->Html->link(__('New Notice'), array('controller' => 'notices', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <h3><?php echo __('Related Notices'); ?></h3>
        <?php if (!empty($systemUser['Notice'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-bordered table-hover">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Title'); ?></th>
            <th><?php echo __('Date Start'); ?></th>
            <th><?php echo __('Date End'); ?></th>
            <th><?php echo __('Description'); ?></th>
            <th><?php echo __('Published State'); ?></th>
            <th><?php echo __('System User Id'); ?></th>
            <th><?php echo __('Article Id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
            $i = 0;
            foreach ($systemUser['Notice'] as $notice): ?>
            <tr>
                <td><?php echo $notice['id']; ?></td>
                <td><?php echo $notice['title']; ?></td>
                <td><?php echo $notice['date_start']; ?></td>
                <td><?php echo $notice['date_end']; ?></td>
                <td><?php echo $notice['description']; ?></td>
                <td><?php echo $notice['published_state']; ?></td>
                <td><?php echo $notice['system_user_id']; ?></td>
                <td><?php echo $notice['article_id']; ?></td>
                <td class="actions">
                    <div class="btn-group">
                    <button class="btn"><?php echo $this->Html->link(__('View'), array('controller' => 'notices', 'action' => 'view', $notice['id'])); ?></button>
                    <button class="btn"><?php echo $this->Html->link(__('Edit'), array('controller' => 'notices', 'action' => 'edit', $notice['id'])); ?></button>
                    <button class="btn"><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'notices', 'action' => 'delete', $notice['id']), null, __('Are you sure you want to delete # %s?', $notice['id'])); ?></button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
