<?php App::uses('Convention','Lib');?>
<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'View Student :: '.h($student['Student']['first_name'])); ?>

<div class="container">
<br>
<div class="row-fluid">
<div id="content" class="span12">
<div>
<div class="span7">
<ul class="thumbnails">
    <li class="thumbnail">
        <?php echo $this->Html->image('../uploads/students/'.$student['Student']['photo'],array('width'=>160,'height'=>160)) ?>
    </li>
</ul>

<h1><?php echo $student['Student']['first_name']." "; if(!empty($student['Student']['middle_name'])){echo $student['Student']['middle_name']." ";} echo $student['Student']['last_name']?></h1>
<h4>B.Sc. <?php echo $student['StudyProgram']['program_code'];?></h4>
<ul class="nav nav-tabs">
    <li class="active">
        <a href="#basic" data-toggle="tab">Basic Details</a>
    </li>
    <li><a href="#bio" data-toggle="tab">Bio</a></li>
    <li><a href="#linkedin" data-toggle="tab">LinkedIn</a></li>
</ul>
<div class="tab-content">
    <div id="basic" class="tab-pane active">
        <br>
        <table class="table table-striped">

            <tbody><tr>
                <td>Batch/Academic Year:</td>
                <td><i class="icon-group"></i> <?php echo $student['Batch']['academic_year'];?></td>
            </tr>
            <tr>
                <td>Student Registration ID:</td>
                <td><i class="icon-credit-card"></i> <?php echo $student['RegistrationNumHeader']['name'].'/'.$student['Batch']['academic_year'].'/'.$student['Student']['reg_number'];?></td>
            </tr>
            </tbody></table>

    </div>
    <div id="bio" class="tab-pane">
                            <span class="thumbnail" style="font-size: 18px">
                                <?php echo $student['Student']['bio'];?>
                            </span>
    </div>
    <div id="linkedin" class="tab-pane">
        <?php if(!empty($student['Student']['linkedin_ref'])):?>
            <script type="IN/MemberProfile" data-id="http://www.linkedin.com/in/<?php echo $student['Student']['linkedin_ref']?>"
                    data-format="inline"></script>
        <?php else: ?>
            <p style="font-style: italic">Sorry no this student didn't added a LinkedIn profile to system.</p>
        <?php endif ?>
    </div>

</div>
</div>
<div class="span5">
    <div class="well" id="reports">
        <div class="alert alert-info no-reports" style="display: block;">
            <h4 class="alert-heading">Info</h4>
            If you are an authorized user in to this system, You may view more details by logging in to the system.
        </div>
        <ul class="nav nav-list"></ul></div>
</div>
</div></div>
</div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
</script>
<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>