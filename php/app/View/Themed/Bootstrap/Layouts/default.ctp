<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$ffsDescription = __d('cake_dev', 'FFS: Fedora Financial System');
?>
<!DOCTYPE html>
<html style="height: 100%;">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $ffsDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->meta(array('name'=>'viewport','content'=>'width=device-width, initial-scale=1.0'));

		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive');
        echo $this->Html->css('http://fonts.googleapis.com/css?family=Comfortaa:400,700',null);

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body style="height: 100%;">
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-th-list"></span>
                </a>
                <a href="http://fedoraproject.org" class="brand" style="font-family: 'Comfortaa', cursive; font-weight: bold;">Fedora Financial System</a>
                <div class="nav-collapse collapse">
                    <ul class="nav pull-right" style="font-family: 'Comfortaa', cursive;">
                        <li><a href="#">Tickets</a></li>
                        <li><a href="#">About FFS</a></li>
                        <li>
                            <?php if($logged_in): ?>
                                <?php echo $this->Html->link('Logout', array('controller'=>'users','action'=>'logout'));?>
                            <?php else: ?>
                                <?php echo $this->Html->link('Login', array('controller'=>'users','action'=>'login'));?>
                            <?php endif; ?>
                        </li>
                        <li>
                            <p class="navbar-text" style="font-weight: bold">
                                <?php if($logged_in): ?>
                                    Welcome <?php echo $current_user['User']['username']; ?>
                                <?php endif; ?>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="wrap">
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>

                </div>
            </div>
        </div>
    </div>

    <div id="push"></div>
    </div>

    <div id="footer">
        <div class="container">
            <p class="text-center">
                The Fedora Project is maintained and driven by the community. This is a community maintained project. Red Hat is not responsible for content.
            </p>
        </div>
    </div>

	<?php echo $this->element('sql_dump'); ?>

<?php
echo $this->Html->script('jquery-1.10.1.min');
echo $this->Html->script('bootstrap');
?>
</body>
</html>
