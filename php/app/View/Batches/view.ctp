<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Batch :: '.h($batch['Batch']['academic_year'])); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Batch'), array('action' => 'edit', $batch['Batch']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Batches'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Batch'), array('action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
    <h2><?php  echo __('Batch'); ?></h2>
        <dl class="dl-horizontal">
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($batch['Batch']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Academic Year'); ?></dt>
            <dd>
                <?php echo h($batch['Batch']['academic_year']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Registration State'); ?></dt>
            <dd>
                <?php
                    if($batch['Batch']['registration_state']=="1")
                    {
                        echo "On";
                    }
                    else
                    {
                        echo "Off";
                    }
                ?>
                &nbsp;
            </dd>
        </dl>
    </div>
</div>
