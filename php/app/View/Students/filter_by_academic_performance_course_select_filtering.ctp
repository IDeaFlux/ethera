<?php //debug($students); ?>
<?php //debug($return_data);?>
<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Filter by Academic Performance'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Filters'), array('controller' => 'homes','action' => 'filters')); ?></li>
        </ul>
    </div>
    <div class="span9">
        <button class="btn btn-large" id="load_enrollments" onclick="goBack()">Go Back to Filter Subject Selection</button>
        <div class="well">
            <legend><?php echo __('Search Results'); ?></legend>
            <table cellpadding="0" cellspacing="0" class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>GPA</th>
                    <th>Action</th>
                </tr>
                <?php foreach($students as $student): ?>
                    <tr>
                        <td><?php echo $student['Student']['id']?></td>
                        <td><?php echo $student['Student']['first_name']?></td>
                        <td><?php echo $student['GPA']?></td>
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
</div>

<script>
    function goBack()
    {
        window.history.back()
    }
</script>
