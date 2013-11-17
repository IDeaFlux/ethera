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

    public function filters() {

    }

    public function ar(){

    }

    public function cgu(){

    }

    public function organization(){
        $user = $this->Auth->user();
        $this->set('id',$user['id']);
    }

    public function backend_router(){
        $user = $this->Auth->user();

        if(!empty($user)){
            if($user['group_id']==1){
                $this->redirect(array('action' => 'admin'));
            }
            if($user['group_id']==2){
                $this->redirect(array('action' => 'cgu'));
            }
            if($user['group_id']==5){
                $this->redirect(array('action' => 'organization'));
            }
            if($user['group_id']==6){
                $this->redirect(array('action' => 'ar'));
            }
            if($user['group_id']==4){
                $this->loadModel('Student');
                $this->Session->setFlash('You are not authorized to access that page','error_flash');
                $this->redirect($this->Auth->logout());
            }
        }
        else{
            $this->redirect(array('action' => 'main'));
        }
    }

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow(array('main','login'));
    }
}