<?php
App::uses('FormHelper', 'View/Helper');
App::uses('Set', 'Utility');

class BootstrapFormHelper extends FormHelper {

	public $helpers = array('Html' => array(
		'className' => 'Bootstrap.BootstrapHtml'
	));

	protected $_divOptions = array();

	protected $_inputOptions = array();

	protected $_inputType = null;

	protected $_fieldName = null;


	public function input($fieldName, $options = array()) {
		$this->_fieldName = $fieldName;

		$default = array(
			'error' => array(
				'attributes' => array(
					'wrap' => 'span',
					'class' => 'help-block text-danger'
				)
			),
			'wrapInput' => array(
				'tag' => 'div'
			),
			'checkboxDiv' => 'checkbox',
			'beforeInput' => '',
			'afterInput' => '',
			'errorClass' => 'has-error error'
		);

		$options = Hash::merge(
			$default,
			$this->_inputDefaults,
			$options
		);

		$this->_inputOptions = $options;

		$options['error'] = false;
		if (isset($options['wrapInput'])) {
			unset($options['wrapInput']);
		}
		if (isset($options['checkboxDiv'])) {
			unset($options['checkboxDiv']);
		}
		if (isset($options['beforeInput'])) {
			unset($options['beforeInput']);
		}
		if (isset($options['afterInput'])) {
			unset($options['afterInput']);
		}
		if (isset($options['errorClass'])) {
			unset($options['errorClass']);
		}

		$inputDefaults = $this->_inputDefaults;
		$this->_inputDefaults = array();

		$html = parent::input($fieldName, $options);

		$this->_inputDefaults = $inputDefaults;

		if ($this->_inputType === 'checkbox') {
			if (isset($options['before'])) {
				$html = str_replace($options['before'], '%before%', $html);
			}
			$regex = '/(<label.*?>)(.*?<\/label>)/';
			if (preg_match($regex, $html, $label)) {
				$html = preg_replace($regex, '', $html);
				$html = preg_replace(
					'/(<input type="checkbox".*?>)/',
					$label[1] . '$1 ' . $label[2],
					$html
				);
			}
			if (isset($options['before'])) {
				$html = str_replace('%before%', $options['before'], $html);
			}
		}

		return $html;
	}


	protected function _divOptions($options) {
		$this->_inputType = $options['type'];

		$divOptions = array(
			'type' => $options['type'],
			'div' => $this->_inputOptions['wrapInput']
		);
		$this->_divOptions = parent::_divOptions($divOptions);

		$default = array('div' => array('class' => null));
		$options = Hash::merge($default, $options);
		$divOptions = parent::_divOptions($options);
		if ($this->tagIsInvalid() !== false) {
			$divOptions = $this->addClass($divOptions, $this->_inputOptions['errorClass']);
		}
		return $divOptions;
	}


	protected function _getInput($args) {
		$input = parent::_getInput($args);
		if ($this->_inputType === 'checkbox' && $this->_inputOptions['checkboxDiv'] !== false) {
			$input = $this->Html->div($this->_inputOptions['checkboxDiv'], $input);
		}

		$beforeInput = $this->_inputOptions['beforeInput'];
		$afterInput = $this->_inputOptions['afterInput'];

		$error = null;
		$errorOptions = $this->_extractOption('error', $this->_inputOptions, null);
		$errorMessage = $this->_extractOption('errorMessage', $this->_inputOptions, true);
		if ($this->_inputType !== 'hidden' && $errorOptions !== false) {
			$errMsg = $this->error($this->_fieldName, $errorOptions);
			if ($errMsg && $errorMessage) {
				$error = $errMsg;
			}
		}

		$html = $beforeInput . $input . $error . $afterInput;

		if ($this->_divOptions) {
			$tag = $this->_divOptions['tag'];
			unset($this->_divOptions['tag']);
			$html = $this->Html->tag($tag, $html, $this->_divOptions);
		}

		return $html;
	}


	protected function _selectOptions($elements = array(), $parents = array(), $showParents = null, $attributes = array()) {
		$selectOptions = parent::_selectOptions($elements, $parents, $showParents, $attributes);

		if ($attributes['style'] === 'checkbox') {
			foreach ($selectOptions as $key => $option) {
				$option = preg_replace('/<div.*?>/', '', $option);
				$option = preg_replace('/<\/div>/', '', $option);
				if (preg_match('/>(<label.*?>)/', $option, $match)) {
					$option = $match[1] . preg_replace('/<label.*?>/', ' ', $option);
					if (isset($attributes['class'])) {
						$option = preg_replace('/(<label.*?)(>)/', '$1 class="' . $attributes['class'] . '"$2', $option);
					}
				}
				$selectOptions[$key] = $option;
			}
		}

		return $selectOptions;
	}

}
