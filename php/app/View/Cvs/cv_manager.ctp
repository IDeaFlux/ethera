<?php App::uses('Convention','Lib');?>
<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'CVs you Own'); ?>

<div class="row">
    <div class="span12">
        <h2><?php echo __('CVs you Own'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-hover">
            <tr>
                <th><?php echo __('ID'); ?></th>
                <th><?php echo __('CV File Name'); ?></th>
                <th><?php echo __('File Size'); ?></th>
                <th><?php echo __('Uploaded Time'); ?></th>
                <th><?php echo __('Currently Active'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($cvs as $cv): ?>
                <tr>
                    <td><?php echo h($cv['Cv']['id']); ?>&nbsp;</td>
                    <td><?php echo h($cv['Cv']['file_name']); ?>&nbsp;</td>
                    <td><?php echo h(Convention::size($cv['Cv']['file_size'])); ?>&nbsp;</td>
                    <td><?php echo h($cv['Cv']['upload_time']); ?>&nbsp;</td>
                    <td>
                        <?php
                        if($cv['Cv']['current'] == 1){
                            echo "<span style='color: green; font-weight: bold'>Active</span>";
                        }
                        else{
                            echo "<span style='color: red; font-weight: bold'>Not-Active</span>";
                        }
                        ?>
                    </td>
                    <td class="actions">
                        <div class="btn-group">
                            <?php echo $this->Html->link(__('View CV'), '../uploads/cvs/'.$cv['Cv']['file_name'],array('class' => 'btn','target' => '_blank')); ?>
                            <?php echo $this->Form->postLink(__('Set Active CV'), array('action' => 'set_active_cv', $cv['Cv']['id']), array('class' => 'btn'), __('Are you set this CV as active?')); ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>