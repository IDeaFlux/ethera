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
	<?php echo $this->Html->css('bootstrap-combined.min'); ?>
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
                    <div class="brand">
                        <?php echo $this->Html->image('logo_small.png', array(
                            'alt' => 'ETHERA',
                            'style' => 'margin: 0px; padding 0px;'
                        ));?>
                    </div>
                    <div class="brand" style="font-family: 'Molengo', sans-serif; font-size: 38px">ETHERA</div>
                    <div class="brand" style="font-family: 'Josefin Sans', sans-serif; font-size: 13px">Multifaceted Student Industrial Placement System</div>
                </div>
            </div>
        </div>
        <div id="push80"></div>
        <div class="container">

            <?php echo $this->fetch('content'); ?>

        </div><!-- /container -->


        <!-- Placed at the end of the document so the pages load faster -->
        <?php
            echo $this->Html->script('jquery.min');
            echo $this->Html->script('bootstrap.min');
            echo $this->Html->script('run_prettify');
         ?>
        <?php echo $this->fetch('script'); ?>
        <div id="push"></div>
    </div>

    <div id="footer">
        <div class="container">
            <p class="text-center">&copy; <a href="http://rjt.ac.lk">Rajarata University of Sri Lanka</a>, Developed by <a href="http://ideaflux.pageshack.com">IDeaFlux</a>.</p>
        </div>
    </div>

</body>
</html>
