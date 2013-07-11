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
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $ffsDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container-fluid">
        <div class="row-fluid">
		<div id="header">
			<h1><?php echo $this->Html->link($ffsDescription, 'http://fedoraproject.org'); ?></h1>
		</div>
		<div id="content">
            <div style="text-align: right;">
                <?php if($logged_in): ?>
                    Welcome <?php echo $current_user['User']['username']; ?>. <?php echo $this->Html->link('Logout', array('controller'=>'users','action'=>'logout'));?>
                <?php else: ?>
                    <?php echo $this->Html->link('Login', array('controller'=>'users','action'=>'login'));?>
                <?php endif; ?>
            </div>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $ffsDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
      </div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
