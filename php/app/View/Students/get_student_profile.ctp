<?php if(!empty($student)) : ?>
<div style="border: 1px solid #ccc;
border: 1px solid rgba(0, 0, 0, 0.15);
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px; text-align: center">
<ul class="thumbnails">
    <li class="thumbnail" style="    display: inline-block;
    *display:inline; /* ie7 fix */
    float: none;
    margin-bottom: 0px;">
                <?php echo $this->Html->image('../uploads/students/'.$student['Student']['photo'],array('width'=>50)) ?>
    </li>
    </ul>
<p style="margin-top: 0px"><?php echo $student['Student']['first_name']." ".$student['Student']['last_name'];?></p>
</div>
<?php endif;?>