<?php

class TinyMCEHelper extends AppHelper {

	public $helpers = array('Html');


	public $configs = array();


	protected $_defaults = array();


	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
		$configs = Configure::read('TinyMCE.configs');
		if (!empty($configs) && is_array($configs)) {
			$this->configs = $configs;
		}
	}

	public function editor($options = array()) {
		if (is_string($options)) {
			if (isset($this->configs[$options])) {
				$options = $this->configs[$options];
			} else {
				throw new OutOfBoundsException(sprintf(__('Invalid TinyMCE configuration preset %s'), $options));
			}
		}
		$options = array_merge($this->_defaults, $options);
		$lines = '';

		foreach ($options as $option => $value) {
			$lines .= Inflector::underscore($option) . ' : "' . $value . '",' . "\n";
		}
		// remove last comma from lines to avoid the editor breaking in Internet Explorer
		$lines = rtrim($lines);
		$lines = rtrim($lines, ',');
		$this->Html->scriptBlock('tinymce.init({' . "\n" . $lines . "\n" . '});' . "\n", array('inline' => false));
	}

	public function beforeRender($viewFile) {
		$appOptions = Configure::read('TinyMCE.editorOptions');
		if ($appOptions !== false && is_array($appOptions)) {
			$this->_defaults = $appOptions;
		}
		$this->Html->script('/TinyMCE/js/tiny_mce/tiny_mce.js', array('inline' => false));
	}
}
