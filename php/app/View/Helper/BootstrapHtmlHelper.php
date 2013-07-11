<?php
App::uses('HtmlHelper', 'View/Helper');
App::uses('Inflector', 'Utility');

class BootstrapHtmlHelper extends HtmlHelper {

	public function useTag($tag) {
		$args = func_get_args();

		if ($tag === 'radio') {
			$class = (isset($args[3]['class'])) ? $args[3]['class'] : 'radio';
			unset($args[3]['class']);
		}

		$html = call_user_func_array(array('parent', 'useTag'), $args);

		if ($tag === 'radio') {
			$regex = '/(<label)(.*?>)/';
			if (preg_match($regex, $html, $match)) {
				$html = $match[1] . ' class="' . $class . '"' . $match[2] . preg_replace($regex, ' ', $html);
			}
		}

		return $html;
	}

}
