<?php



class RecaptchaBehavior extends ModelBehavior {


    public $settings = array();


    public $defaults = array(
        'errorField' => 'recaptcha');


    public function setup(Model $Model, $settings = array()) {
        if (!isset($this->settings[$Model->alias])) {
            $this->settings[$Model->alias] = $this->defaults;
        }
        $this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], (is_array($settings) ? $settings : array()));
        //debug($this->settings);
    }


    public function validateCaptcha(Model $Model) {
        //debug($Model->recaptcha);
        //$Model->validationErrors['daco'][0] = 'Error';
        if (isset($Model->recaptcha) && $Model->recaptcha == false) {
            $Model->invalidate($this->settings[$Model->alias]['errorField'], $Model->recaptchaError);
        }
        return true;
    }


    public function beforeValidate(Model $Model) {
        $this->validateCaptcha($Model);
        return true;
    }

}