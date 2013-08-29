<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Student :: '.h($student['Student']['first_name'])); ?>

<div class="row">
    <div class="span3">
        <h3><?php echo __('Actions'); ?></h3>
        <ul class="nav nav-tabs nav-stacked">
            <li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
        </ul>
    </div>

    <div class="span9">
        <h2><?php  echo __('Student'); ?></h2>

        <ul class="thumbnails">
            <li class="thumbnail">
                <?php echo $this->Html->image('../uploads/students/'.$student['Student']['photo'],array('width'=>100)) ?>
            </li>
        </ul>

        <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
        <script type="IN/MemberProfile" data-id="http://www.linkedin.com/in/<?php echo $student['Student']['linkedin_ref']?>"
                data-format="inline"></script>


        <dl class='dl-horizontal'>
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($student['Student']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('First Name'); ?></dt>
            <dd>
                <?php echo h($student['Student']['first_name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Middle Name'); ?></dt>
            <dd>
                <?php echo h($student['Student']['middle_name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Last Name'); ?></dt>
            <dd>
                <?php echo h($student['Student']['last_name']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Phone Home'); ?></dt>
            <dd>
                <?php echo h($student['Student']['phone_home']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Phone Mob'); ?></dt>
            <dd>
                <?php echo h($student['Student']['phone_mob']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Email'); ?></dt>
            <dd>
                <?php echo h($student['Student']['email']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Group'); ?></dt>
            <dd>
                <?php echo $this->Html->link($student['Group']['name'], array('controller' => 'groups', 'action' => 'view', $student['Group']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Reg Number'); ?></dt>
            <dd>
                <?php echo h($student['Student']['reg_number']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Gender'); ?></dt>
            <dd>
                <?php echo h($student['Student']['gender']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Date Of Birth'); ?></dt>
            <dd>
                <?php echo h($student['Student']['date_of_birth']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Address1'); ?></dt>
            <dd>
                <?php echo h($student['Student']['address1']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Address2'); ?></dt>
            <dd>
                <?php echo h($student['Student']['address2']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('City'); ?></dt>
            <dd>
                <?php echo h($student['Student']['city']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Linkedin Ref'); ?></dt>
            <dd>
                <?php echo h($student['Student']['linkedin_ref']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Study Program'); ?></dt>
            <dd>
                <?php echo $this->Html->link($student['StudyProgram']['program_code'], array('controller' => 'study_programs', 'action' => 'view', $student['StudyProgram']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Batch'); ?></dt>
            <dd>
                <?php echo $this->Html->link($student['Batch']['academic_year'], array('controller' => 'batches', 'action' => 'view', $student['Batch']['id'])); ?>
                &nbsp;
            </dd>
        </dl>
    </div>

</div>



