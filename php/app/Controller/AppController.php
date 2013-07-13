<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {
    public $components = array('Acl','DebugKit.Toolbar','Session');

    public $helpers = array(
        'Html' => array('className' => 'BootstrapHtml'),
        'Form' => array('className' => 'BootstrapForm'),
        'Paginator' => array('className' => 'BootstrapPaginator'),
    );

}

