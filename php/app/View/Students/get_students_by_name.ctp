<?php if(!empty($students)): ?>
    <div class="span3">
    </div>
    <div class="span9">
        <div class="well">
            <legend><?php echo __('Search Results'); ?></legend>
            <table cellpadding="0" cellspacing="0" class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Action</th>
                </tr>
                <?php foreach($students as $student): ?>
                    <tr>
                        <td><?php echo $student['Student']['id']?></td>
                        <td><?php echo $student['Student']['first_name']?></td>
                        <td class="actions">
                            <div class="btn-group">
                                <?php echo $this->Html->link(__('Load Profile'), array('action' => 'view', $student['Student']['id']),array('class' => 'btn')); ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
<?php endif; ?>