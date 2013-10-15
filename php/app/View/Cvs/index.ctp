<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Cv'); ?>

<div class="cvs row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('New CV'), array('action' => 'add')); ?></li>
            <li><?php //echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
            <li><?php //echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <div class="span9">
	    <h2><?php echo __('CV List'); ?></h2>
	    <table cellpadding="0" cellspacing="0" class="table table-hover">
	        <tr>
			    <th><?php echo $this->Paginator->sort('student_id'); ?></th>
			    <th><?php echo $this->Paginator->sort('reviewed_state'); ?></th>
			    <th><?php echo $this->Paginator->sort('upload_time'); ?></th>
			    <th class="actions"><?php echo __('Actions'); ?></th>
	        </tr>
	        <?php foreach ($cvs as $cv): ?>
	        <tr>
		       <!-- <td><?php// echo h($cv['Cv']['id']); ?>&nbsp;</td>  -->
		        <td>
			<?php echo $this->Html->link($cv['Student']['reg_number'], array('controller' => 'students', 'action' => 'view', $cv['Student']['id'])); ?>
		        </td>
		        <td><?php echo h($cv['Cv']['reviewed_state']); ?>&nbsp;</td>
		        <td><?php echo h($cv['Cv']['upload_time']); ?>&nbsp;</td>
		        <td class="actions">
                    <div class="btn-group">
			            <?php echo $this->Html->link(__('View'), array('action' => 'view', $cv['Cv']['id']),array('class' => 'btn')); ?>
			            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cv['Cv']['id']),array('class' => 'btn')); ?>
			            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cv['Cv']['id']),array('class' => 'btn'), null, __('Are you sure you want to delete # %s?', $cv['Cv']['id'])); ?>
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
