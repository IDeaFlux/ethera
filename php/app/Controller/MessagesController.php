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
                $Email = new CakeEmail('gmail');
                //$Email->config('gmail');
                $Email->from(array('postmaster.fnp@gmail.com' => "Postmaster"));
                $Email->to($data['to']);
                $Email->subject($data['subject']);
                $Email->send($data['body']);
            }

            $this->redirect(array('controller'=>'messages','action'=>'email'));
        }

    }
}