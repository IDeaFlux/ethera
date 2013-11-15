<?php
// For a list available settings, please see the `dompdf_config.custom.inc.php` file located in the root of your dompdf installation. Please camel case the options and drop the DOMPDF_ prefix.
$config['dompdf'] = array(
	'enablePhp' => false,
	'enableRemote' => true,
	'dpi' => 72,
	'tempDir' => CACHE . 'dompdf'
);
