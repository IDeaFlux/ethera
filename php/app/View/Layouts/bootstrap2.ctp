<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo "එතෙර (Ethera):: Multifaceted Student Industrial Placement System
:: ".$title; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php
    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('bootstrap-responsive.min');
    echo $this->Html->css('font-awesome.min.css');
    echo $this->Html->css('smoothness/jquery-ui.min');
    echo $this->Html->script('jquery.min');
    ?>
    <link href='http://fonts.googleapis.com/css?family=Lato|Josefin+Sans|Molengo' rel='stylesheet' type='text/css'>
	<style>
        html {height: 100%;}
        body {
            /*padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            height: 100%;
        }
        .affix {
            position: fixed;
            top: 60px;
            width: 220px;
        }
        #wrap {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            /* Negative indent footer by it's height */
            margin: 0 auto -60px;
        }
        #push,
        #footer {
            height: 60px;
        }

        #push80 {
            height: 80px;
        }
        #footer {
            background-color: #ebe9ed;
        }
        @media (max-width: 767px) {
            #footer {
                margin-left: -20px;
                margin-right: -20px;
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>

	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>

<body>
    <div id="wrap">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-th-list"></span>
                    </a>
                    <div class="brand">
                        <?php echo $this->Html->image('logo_small.png', array(
                            'alt' => 'ETHERA',
                            'style' => 'margin: 0px; padding 0px;'
                        ));?>
                    </div>
                    <?php
                    $i = "<div class=\"brand\" style=\"font-family: 'Molengo', sans-serif; font-size: 38px\">ETHERA</div>";
                    echo $this->Html->link(
                        $i,
                        array('controller' => 'homes', 'action' => 'main'),
                        array(
                            'escape' => false
                        )
                    );
                    ?>
                    <?php if(!$logged_in): ?>
                    <div class="brand" style="font-family: 'Josefin Sans', sans-serif; font-size: 13px">Multifaceted Student Industrial Placement System</div>
                    <?php endif; ?>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li><?php echo $this->Html->link('Blog', array('controller'=>'articles','action'=>'blog'));?></li>
                            <li class="divider-vertical"></li>
                            <li><?php echo $this->Html->link('Register', array('controller'=>'students','action'=>'register'));?></li>
                            <li class="divider-vertical"></li>
                            <li><?php if($logged_in && $current_user['group_id']!=4):?>
                            <?php echo $this->Html->link('Backend', array('controller'=>'homes','action'=>'backend_router'));?></li>
                            <li class="divider-vertical"></li>
                            <?php endif; ?>
                            <li><?php if($logged_in && $current_user['group_id']==4):?>
                            <?php echo $this->Html->link('My Profile', array('controller'=>'homes','action'=>'student'));?></li>
                            <li class="divider-vertical"></li>
                            <?php endif; ?>
                            <li><a href="#">About ETHERA</a></li>
                            <li class="divider-vertical"></li>
                            <li>
                                <?php if($logged_in): ?>
                                    <?php echo $this->Html->link('Logout', array('controller'=>'system_users','action'=>'logout'));?>
                                <?php else: ?>
                                    <?php echo $this->Html->link('Login', array('controller'=>'homes','action'=>'login'));?>
                                <?php endif; ?>
                            </li>
                            <li>
                                <p class="navbar-text" style="font-weight: bold">
                                    <?php if($logged_in): ?>
                                        Welcome <?php echo $current_user['first_name']; ?>
                                    <?php endif; ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="push80"></div>
        <div class="container">
            <?php echo $this->Session->flash();
             echo $this->fetch('content'); ?>

        </div><!-- /container -->


        <!-- Placed at the end of the document so the pages load faster -->
        <?php
            //echo $this->Html->script('jquery.min');
            echo $this->Html->script('jquery-ui.min');
            echo $this->Html->script('bootstrap.min');
            echo $this->Html->script('run_prettify');
         ?>
        <?php echo $this->fetch('script'); ?>
        <?php
        if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
        // Writes cached scripts
        ?>
        <div id="push"></div>
    </div>

    <div id="footer">
        <div class="container">
            <p class="text-center">&copy; <a href="http://rjt.ac.lk">Rajarata University of Sri Lanka</a>, Developed by <a href="http://ideaflux.pageshack.com">IDeaFlux</a>.</p>
        </div>
    </div>

</body>
</html>
