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
    <li><a href="#cgu" data-toggle="tab">Submissions</a></li>
    <li><a href="#academics" data-toggle="tab">Academics</a></li>
    <li><a href="#a_overall" data-toggle="tab">Academic Overall</a></li>
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
            <tr>
                <td>Mobile Phone:</td>
                <td><i class="icon-mobile-phone"></i>  <?php echo " ".$student['Student']['phone_mob'];?></td>
            </tr>
            <tr>
                <td>Home Phone:</td>
                <td><i class="icon-phone"></i> <?php echo $student['Student']['phone_home'];?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><i class="icon-envelope"></i> <a href="mailto:<?php echo $student['Student']['email'];?>"><?php echo $student['Student']['email'];?></a></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><i class="icon-home"></i> <?php echo $student['Student']['address1'].", "; if(!empty($student['Student']['address2'])){echo $student['Student']['address2'].", ";} echo $student['Student']['city']."."?></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><i class="icon-calendar"></i> <?php echo $student['Student']['date_of_birth'];?></td>
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

    <div id="cgu" class="tab-pane">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>ID</th>
                <th>Priority</th>
                <th>Interested Area</th>
                <th>Organization</th>
                <th>State</th>
            </tr>
            <?php
            $assignments = $student['Assignment'];
            if(!empty($assignments)):
                foreach($assignments as $assignment):
                    ?>
                    <tr>
                        <td><?php if(!empty($assignment['id'])){echo $assignment['id'];} ?></td>
                        <td><?php if(!empty($assignment['priority'])){echo $assignment['priority'];} ?></td>
                        <td><?php if(!empty($assignment['InterestedArea']['name'])){echo $assignment['InterestedArea']['name'];} ?></td>
                        <td><?php if(!empty($assignment['Organization']['name'])){echo $assignment['Organization']['name'];} ?></td>
                        <td><?php if(!empty($assignment['state'])){echo Convention::assignment_state($assignment['state']);} ?></td>
                    </tr>
                <?php
                endforeach;
            endif;
            ?>
            </tbody></table>
    </div>
    <div id="academics" class="tab-pane">

        <legend>Current Enrollments & Results</legend>
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>Enrollment ID</th>
                <th>Course Unit</th>
                <th>Course Code</th>
                <th>Result</th>
            </tr>
            <?php
            $enrollments = $student['Enrollment'];
            if(!empty($enrollments)):
                foreach($enrollments as $enrollment):
                    ?>
                    <tr>
                        <td><?php if(!empty($enrollment['id'])){echo $enrollment['id'];} ?></td>
                        <td><?php if(!empty($enrollment['CourseUnit']['name'])){echo $enrollment['CourseUnit']['name'];} ?></td>
                        <td><?php if(!empty($enrollment['CourseUnit']['code'])){echo $enrollment['CourseUnit']['code'];} ?></td>
                        <td><?php if(!empty($enrollment['grade'])){echo $enrollment['grade'];} ?></td>
                    </tr>
                <?php
                endforeach;
            endif;
            ?>
            </tbody>
        </table>
    </div>

    <div id="a_overall" class="tab-pane">
        <table class="table table-striped">

            <tbody>
            <tr>
                <td>GPA:</td>
                <td style="font-weight: bold">
                    <?php if(!empty($gpa))echo $gpa ?>
                </td>
            </tr>
            <tr>
                <td>Marks for Extra Activities:</td>
                <td style="font-weight: bold">
                    <?php if(!empty($ea_value))echo $ea_value ?>
                </td>
            </tr>
            <tr>
                <td>Final Mark:</td>
                <td style="font-weight: bold">
                    <?php if(!empty($final_value))echo $final_value ?>
                </td>
            </tr>
            </tbody></table>
    </div>
</div>
</div>
<div class="span5">
    <div class="well" id="reports">
        <h3 class="modal-header">Options</h3>
        <ul class="nav nav-tabs nav-stacked">
            <?php
            $cvs = $student['Cv'];
            if(!empty($cvs)){
                foreach($cvs as $cv){
                    if($cv['current']==1){
                        $current_cv = $cv;
                    }
                }
            }
            ?>
            <?php if(!empty($current_cv)): ?>
                <li><?php echo $this->Html->link(__('View CV'), '../uploads/cvs/'.$current_cv['file_name'],array('target' => '_blank')); ?></li>
            <?php endif; ?>
        </ul>
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