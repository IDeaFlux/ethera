<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Special Opportunity List'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Back'), array('controller'=>'homes','action' => 'backend_router')); ?></li>
        </ul>
    </div>

    <div class="span9">
        <table cellpadding="0" cellspacing="0" class="table table-hover">
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('student_id'); ?></th>
                <th><?php echo $this->Paginator->sort('assignment_id'); ?></th>
                <th><?php echo $this->Paginator->sort('state'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($special_opportunities as $special_opportunity): ?>
                <tr>
                    <td><?php echo h($special_opportunity['SpecialOpportunity']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($special_opportunity['Student']['last_name'], array('controller' => 'students', 'action' => 'student_profile_router', $special_opportunity['Student']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $special_opportunity['Assignment']['InterestedArea']['name']; ?>
                    </td>
                    <td>
                        <?php
                        if($special_opportunity['SpecialOpportunity']['state'] == 0){
                            echo "<span style='color: darkorange; font-weight: bold'>Not Accepted</span>";
                        }
                        else if($special_opportunity['SpecialOpportunity']['state'] == 1){
                            echo "<span style='color: green; font-weight: bold'>Accepted</span>";
                        }
                        ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Form->postLink(__('Delete'), array('controller'=>'special_opportunities','action' => 'delete', $special_opportunity['SpecialOpportunity']['id']), array('class' => 'btn'), __('Are you sure you want to delete this opportunity?')); ?>
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
            <?php
            echo $this->Paginator->pagination(array(
                'div'=>'pagination pagination-centered'
            ));
            ?>
        </div>
    </div>
</div>