<?php
App::uses('AppController', 'Controller');

class HomesController extends AppController {
    public function admin() {

    }

    public function main() {

    }

    public function student_processing() {

    }

    public function student() {

    }

    public function login() {

    }

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow(array('main','login'));
    }
}