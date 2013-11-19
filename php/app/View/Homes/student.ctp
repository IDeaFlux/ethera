<?php $this->layout = 'bootstrap2'; ?>
<?php $this->set('title', 'Admin Home'); ?>

<h1 align="center">Welcome to ETHERA Student Control Panel</h1>

<div class="container">
    <ul class="thumbnails">
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-user icon-4x\"></i></p>
                <p class=\"text-center\">My Profile</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'students', 'action' => 'my_profile'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>
        <li class="span2">
            <?php
            $i = "<p class=\"text-center\"><i class=\"icon-bullhorn icon-4x\"></i></p>
                <p class=\"text-center\">Feedback</p>";
            echo $this->Html->link(
                $i,
                array('controller' => 'feedbacks', 'action' => 'select_organization'),
                array(
                    'class' => 'thumbnail',
                    'escape' => false
                )
            );
            ?>
        </li>

        <?php if(($no_sp_ops==false)&&($accepted==false)&&($user['processing_state']==0)): ?>
            <li class="span2">
                <?php
                $i = "<p class=\"text-center\"><i class=\"icon-thumbs-up icon-4x\"></i></p>
                <p class=\"text-center\">Special Opportunities</p>";
                echo $this->Html->link(
                    $i,
                    array('controller' => 'special_opportunities', 'action' => 'consider',$user['id']),
                    array(
                        'class' => 'thumbnail',
                        'escape' => false,
                        'style' => 'color:red;',
                    )
                );
                ?>
            </li>
        <?php endif; ?>

        <?php if($have_interview==true): ?>
            <li class="span2">
                <?php
                $i = "<p class=\"text-center\"><i class=\"icon-spinner icon-spin icon-4x\"></i></p>
                <p class=\"text-center\">Update Interview Results</p>";
                echo $this->Html->link(
                    $i,
                    array('controller' => 'students', 'action' => 'update_interview_results',$user['id']),
                    array(
                        'class' => 'thumbnail',
                        'escape' => false,
                        'style' => 'color:red;',
                    )
                );
                ?>
            </li>
        <?php endif; ?>
    </ul>

    <?php if(($no_sp_ops==false)&&($accepted==false)&&($user['processing_state']==0)): ?>
        <div class="alert alert-danger">
            <h3 class="text-center">Alert!</h3>
            <p class="text-center">Some Organizations have offered you Special Opportunities! Please click "Special Opportunities" button (In red color) to check.<p>
        </div>
    <?php endif; ?>

    <?php if($have_interview==true): ?>
        <div class="alert alert-danger">
            <h3 class="text-center">Alert!</h3>
            <p class="text-center">You have selected for an Interview. Please contact the Career
                Guidance Unit for more details. If you have already faced the interview, please update the
            interview result using "Update Interview Results" button.
            <p>
        </div>
    <?php endif; ?>
</div>
