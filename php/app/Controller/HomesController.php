<?php
App::uses('AppController', 'Controller');

class HomesController extends AppController {
    public function admin() {

    }

    public function main() {

    }

    public function student_processing() {

    }

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('main');
    }
}