<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class MessagesController extends AppController {

    public $uses = array();
    public $name = 'Messages';

    public function sms() {

    }

    public function email() {

        if($this->request->is('post')){
            if($this->request->data)
            {
                $data = $this->request->data;
                $Email = new CakeEmail();
                $Email->config('gmail');
                $Email->from(array('ethera.rjt@gmail.com' => 'ETHERA Postmaster'));
                $Email->to($data['to']);
                $Email->subject($data['subject']);
                $Email->send($data['body']);
            }

            $this->redirect(array('controller'=>'messages','action'=>'email'));
        }

    }
}