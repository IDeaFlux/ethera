<?php

App::uses('Controller', 'Controller');
App::uses('StudentAuthenticate', 'Controller/Component/Auth');
App::uses('SystemUserAuthenticate', 'Controller/Component/Auth');

class AppController extends Controller {
    public $components = array('DebugKit.Toolbar','RequestHandler','Session',//'Auth'=>array(
//        'authenticate' => array(
//            'Form' => array(
//                'userModel' => 'SystemUser',
//                'fields' => array('username'=>'email')
//            ),
//        ),
//
//        'loginRedirect'=>array('controller'=>'homes','action'=>'admin'),
//        'logoutRedirect'=>array('controller'=>'homes','action'=>'main'),
//        'authError'=>'You cannot access that page',
//        'authorize'=> array('Controller'),
//
//    ),
        'Auth' => array(
            'loginRedirect'=>array('controller'=>'homes','action'=>'admin'),
            'logoutRedirect'=>array('controller'=>'homes','action'=>'main'),
            'authError'=>'You cannot access that page',
            'authorize'=> array('Controller'),
            'authenticate' => array(
                'Student' => array(
                    'userModel' => 'Student',
                    'fields' => array(
                        'username' => 'email',
                    )
                ),
                'SystemUser' => array(
                    'userModel' => 'SystemUser',
                    'fields' => array(
                        'username' => 'email',
                    )
                )
            )
        )
    );

    public $helpers = array(
        'Html' => array('className' => 'BootstrapHtml'),
        'Form' => array('className' => 'BootstrapForm'),
        'Paginator' => array('className' => 'BootstrapPaginator'),
    );

    public function isAuthorized($user){
        return true;
    }


    public function beforeFilter(){
        //$this->Auth->allow('index','view');
        $this->Auth->loginAction = array(
            'controller' => 'system_users',
            'action' => 'login'
        );
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
    }
}

