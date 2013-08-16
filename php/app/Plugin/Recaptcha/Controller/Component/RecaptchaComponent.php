<?php


App::uses('HttpSocket', 'Network/Http');


class RecaptchaComponent extends Component {


    public $Controller = null;


    public $apiUrl = 'http://www.google.com/recaptcha/api/verify';


    public $privateKey = '';


    public $error = null;


    public $actions = array();


    public $settings = array();


    public function initialize(Controller $controller, $settings = array()) {
        if ($controller->name == 'CakeError') {
            return;
        }
        $this->privateKey = Configure::read('Recaptcha.privateKey');
        $this->Controller = $controller;

        if (empty($this->privateKey)) {
            throw new Exception(__d('recaptcha', "You must set your private recaptcha key using Configure::write('Recaptcha.privateKey', 'your-key');!", true));
        }

        $defaults = array(
            'modelClass' => $this->Controller->modelClass,
            'errorField' => 'recaptcha',
            'actions' => array()
        );

        $this->settings = array_merge($defaults, $settings);
        $this->actions = array_merge($this->actions, $this->settings['actions']);
        unset($this->settings['actions']);
    }


    public function startup(Controller $controller) {
        extract($this->settings);
        if ($this->Controller->Components->enabled('Recaptcha')) {
            // Automatic mode .. using actions
            if (in_array($this->Controller->action, $this->actions)) {
                $this->Controller->helpers[] = 'Recaptcha.Recaptcha';

                $this->Controller->{$modelClass}->recaptcha = true;
                $this->Controller->{$modelClass}->Behaviors->load('Recaptcha.Recaptcha', array(
                    'errorField' => $errorField
                ));
                $helper_options['useActions'] = true;
                if (!$this->verify()) {
                    $this->Controller->{$modelClass}->recaptcha = false;
                    $this->Controller->{$modelClass}->recaptchaError = $this->error;
                    $helper_options['error'] = $this->error;
                }
                // Manual mode
            } else {
                $helper_options['useActions'] = false;   
            }
            $this->Controller->helpers['Recaptcha.Recaptcha'] = $helper_options;
            //debug($this->Controller->helpers);
        }
    }


    public function verify() {
        if (isset($this->Controller->request->data['recaptcha_challenge_field']) &&
                isset($this->Controller->request->data['recaptcha_response_field'])) {

            $response = $this->_getApiResponse();
            $response = explode("\n", $response);

            if (empty($response[0])) {
                $this->error = __d('recaptcha', 'Invalid API response, please contact the site admin.', true);
                return false;
            }

            if ($response[0] == 'true') {
                return true;
            }

            if ($response[1] == 'incorrect-captcha-sol') {
                $this->error = __d('recaptcha', 'Incorrect captcha', true);
            } else {
                $this->error = $response[1];
            }

            return false;
        }
    }


    protected function _getApiResponse() {
        $Socket = new HttpSocket();
        return $Socket->post($this->apiUrl, array(
                    'privatekey' => $this->privateKey,
                    'remoteip' => env('REMOTE_ADDR'),
                    'challenge' => $this->Controller->request->data['recaptcha_challenge_field'],
                    'response' => $this->Controller->request->data['recaptcha_response_field']));
    }

}
