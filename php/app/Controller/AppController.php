<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {
    public $components = array('Acl','DebugKit.Toolbar','Session','Auth'=>array(
        'authenticate' => array(
            'Form' => array(
                'userModel' => 'SystemUser',
                'fields' => array('username'=>'email')
            )
        ),
        'loginRedirect'=>array('controller'=>'homes','action'=>'admin'),
        'logoutRedirect'=>array('controller'=>'homes','action'=>'main'),
        'authError'=>'You cannot access that page',
        'authorize'=> array('Controller'),

    ));

    public $helpers = array(
        'Html' => array('className' => 'BootstrapHtml'),
        'Form' => array('className' => 'BootstrapForm'),
        'Paginator' => array('className' => 'BootstrapPaginator'),
    );

    public function isAuthorized($user){
        return true;
    }


    public function beforeFilter(){
        $this->Auth->loginAction = array(
            'controller' => 'system_users',
            'action' => 'login'
        );
        //$this->Auth->allow('index','view');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
    }
}

