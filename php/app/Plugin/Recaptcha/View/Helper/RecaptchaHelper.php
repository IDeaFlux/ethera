<?php


class RecaptchaHelper extends AppHelper {


    public $secureApiUrl = 'https://www.google.com/recaptcha/api';


    public $apiUrl = 'http://www.google.com/recaptcha/api';


    public $helpers = array('Form', 'Html');
    public $settings = array('error' => null, 'useActions' => true, 'errorType' => 'simulateError');

    function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
        $this->settings = array_merge($this->settings, $settings);
        //debug($settings);
    }

    function isError() {
        return!($this->settings['error'] == null);
    }

    function getError() {
        return $this->settings['error'];
    }


    public function display($options = array()) {
        $defaults = array(
            'errorInput' => '',
            'element' => null,
            'publicKey' => Configure::read('Recaptcha.publicKey'),
            'error' => null,
            'ssl' => true,
            'error' => false,
            'div' => array(
                'class' => 'recaptcha'),
            'recaptchaOptions' => array(
                'theme' => 'red',
                'lang' => 'en',
                'custom_translations' => array(),
                'callback' => 'Recaptcha.focus_response_field'));

        $options = array_merge($defaults, $options);
        extract($options);

        if ($ssl) {
            $server = $this->secureApiUrl;
        } else {
            $server = $this->apiUrl;
        }

        if (!empty($element)) {
            $elementOptions = array();
            if (is_array($element)) {
                $keys = array_keys($element);
                $elementOptions = $element[$keys[0]];
            }

            return $this->View->element($element, $elementOptions);
        }

        $jsonOptions = preg_replace('/"callback":"([^"\r\n]*)"/', '"callback":$1', json_encode($recaptchaOptions));
        unset($recaptchaOptions);

        if (empty($this->params['isAjax'])) {
            $configScript = sprintf('var RecaptchaOptions = %s', $jsonOptions);
            $this->Html->scriptBlock($configScript, array('inline' => false));
            
            $script = '<script type="text/javascript" src="' . $server . '/challenge?k=' . $publicKey . '"></script>
				<noscript>
					<iframe src="' . $server . '/noscript?k=' . $publicKey . '" height="300" width="500" frameborder="0"></iframe><br/>
					<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
					<input type="hidden" name="recaptcha_response_field" value="manual_challenge"/>
				</noscript>';


            if ($options['div'] != false) {
                $script = $this->Html->tag('div', $script, $options['div']);
            }

            $this->Form->unlockField('recaptcha_challenge_field');
            $this->Form->unlockField('recaptcha_response_field');
            
            //$this->settings['errorType'] = 'formInput';
            
            if ($this->settings['errorType'] == 'formInput' && $this->settings['useActions']) {
                $this->Form->unlockField('recaptcha');
                echo $this->Form->input('recaptcha', array('hidden' => true, 'label' => ''));
            }
            
            if ($this->isError() && $this->settings['errorType'] == 'simulateError') {
                $script = '<div class="error">' . $script . '<div class="error-message">' . $this->getError() . '</div></div>';
            }

            return $script;
        }

        $id = uniqid('recaptcha-');

        return '<div id="' . $id . '"></div>' .
                '<script>
					if (window.Recaptcha == undefined) {
						(function() {
							var headID = document.getElementsByTagName("head")[0];
							var newScript = document.createElement("script");
							newScript.type = "text/javascript";
							newScript.onload = function() {
								Recaptcha.create("' . $publicKey . '", "' . $id . '", ' . $jsonOptions . ');
							};
							newScript.src = "' . $server . '/js/recaptcha_ajax.js"
							headID.appendChild(newScript);
						})();
					} else {
						setTimeout(\'Recaptcha.create("' . $publicKey . '", "' . $id . '", ' . $jsonOptions . ')\', 1000);
					}
				</script>';
    }


    public function signupUrl($appName = null) {
        return "http://recaptcha.net/api/getkey?domain=" . WWW_ROOT . '&amp;app=' . urlencode($appName);
    }


    private function __AesPad($val) {
        $blockSize = 16;
        $numpad = $blockSize - (strlen($val) % $blockSize);
        return str_pad($val, strlen($val) + $numpad, chr($numpad));
    }


    private function __AesEncrypt($value, $key) {
        if (!function_exists('mcrypt_encrypt')) {
            throw new Exception(__d('recaptcha', 'To use reCAPTCHA Mailhide, you need to have the mcrypt php module installed.', true));
        }

        $mode = MCRYPT_MODE_CBC;
        $encryption = MCRYPT_RIJNDAEL_128;
        $value = $this->__AesPad($value);

        return mcrypt_encrypt($encryption, $key, $value, $mode, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
    }


    private function __mailhideUrlbase64($x) {
        return strtr(base64_encode($x), '+/', '-_');
    }


    public function mailHideUrl($email = null) {
        $publicKey = Configure::read('Recaptcha.mailHide.publicKey');
        $privateKey = Configure::read('Recaptcha.mailHide.privateKey');

        if ($publicKey == '' || $publicKey == null || $privateKey == "" || $privateKey == null) {
            throw new Exception(__d('recaptcha', "You need to set a private and public mail hide key. Please visit http://mailhide.recaptcha.net/apikey", true));
        }

        $key = pack('H*', $privateKey);
        $cryptmail = $this->__AesEncrypt($email, $key);

        return "http://mailhide.recaptcha.net/d?k=" . $publicKey . "&c=" . $this->__mailhideUrlbase64($cryptmail);
    }


    private function __hideEmailParts($email) {
        $array = preg_split("/@/", $email);

        if (strlen($array[0]) <= 4) {
            $array[0] = substr($array[0], 0, 1);
        } else if (strlen($array[0]) <= 6) {
            $array[0] = substr($array[0], 0, 3);
        } else {
            $array[0] = substr($array[0], 0, 4);
        }
        return $array;
    }


    public function mailHide($email) {
        $emailparts = $this->__hideEmailParts($email);
        $url = $this->mailHideUrl($email);

        return htmlentities($emailparts[0]) . "<a href='" . htmlentities($url) .
                "' onclick=\"window.open('" . htmlentities($url) . "', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;\" title=\"Reveal this e-mail address\">...</a>@" . htmlentities($emailparts [1]);
    }

}
