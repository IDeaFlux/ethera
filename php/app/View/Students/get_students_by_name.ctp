<legend><?php echo __('Search Results'); ?></legend>
<?php if(!empty($students)): ?>
<table cellpadding="0" cellspacing="0" class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>First Name</th>
    </tr>
    <?php foreach($students as $student): ?>
        <tr>
            <td><?php echo $student['Student']['id']?></td>
            <td><?php echo $student['Student']['first_name']?></td>
        </tr>
    <?php endforeach;?>
</table>
<?php endif; ?>