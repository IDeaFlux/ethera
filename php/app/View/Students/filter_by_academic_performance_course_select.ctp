<?php //debug($courses); ?>
<?php //debug($subjects); ?>
<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Filter by Academic Performance'); ?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Filters'), array('controller' => 'homes','action' => 'filters')); ?></li>
        </ul>
    </div>
    <div class="span9">
        <?php echo $this->Form->create('Batch',array(
            'novalidate' => true,
            'type'=>'file',
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
//                'wrapInput' => 'controls'
            //Removed because it does have 180px margin
            ),
            'class' => 'well form-horizontal'
        )); ?>
        <?php if(!empty($courses)) : ?>
            <?php $count = 0;?>
            <?php foreach($subjects as $subject): ?>
                <?php $printed=0; ?>
                <?php foreach($courses as $course){
                    if(($subject['Subject']['id'] == $course['CourseUnit']['subject_id'])&&($printed==0)){
                        echo "<legend>".$subject['Subject']['description']."</legend>";
                        $printed = 1;
                    }
                }
                ?>
                <?php foreach($courses as $course): ?>
                    <?php if($subject['Subject']['id'] == $course['CourseUnit']['subject_id']): ?>
                        <label class="checkbox inline" for="<?php echo $course['CourseUnit']['code'];?>">
                            <?php
                            echo $this->Form->input(
                                'CourseUnit.'.$count.'.id',
                                array(
                                    'type'=>'checkbox',
                                    'value'=>$course['CourseUnit']['id'],
                                    'hiddenField' => false,
                                    'class' => array(null),
                                    'label'=>false,
                                    'rel'=>'popover',
                                    'data-content' => $course['CourseUnit']['syllabus'],
                                    'data-original-title' => $course['CourseUnit']['name']
                                )
                            );?>
                            <a href="#" id="course<?php echo $count;?>"><?php echo $course['CourseUnit']['code'];?></a>
                        </label>
                        <?php
                        $count++;
                        ?>
                    <?php endif; ?>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php endif;?>
        <div class="form-actions">
            <button class="btn btn-large" id="">Filter</button>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<script type="text/javascript">
<!--    $(function ()-->
<!--    {-->
<!--    --><?php
//    for($i=0;$i<$count;$i++):
//    ?>
<!--    $("#course--><?php //echo $i;?><!--").popover({trigger: 'hover'});-->
<!--    --><?php //endfor; ?>
<!--    });-->
$(document).ready(function ()
{
    $("#course0").popover({trigger: 'hover',
        html: true,
        placement: 'right'});
});
</script>