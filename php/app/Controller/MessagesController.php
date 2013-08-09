<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class MessagesController extends AppController {

    public $uses = array();
    public $name = 'Messages';

    public function sms() {

    }

    public function email($data = null) {



    }
    public function studentMail(){
        if($this->request->is('post')){
            if($this->request->data)
            {
                $data = $this->request->data;
                $Email = new CakeEmail('gmail');
                //$Email->config('gmail');
                $Email->from(array('postmaster.fnp@gmail.com' => "ETHERA Postmaster"));
                $Email->sender('ethera.rjt@gmail.com', 'ETHERA Postmaster');
                $Email->to($data['to']);
                $Email->subject($data['subject']);
                $Email->send($data['body']);
            }

            $this->redirect(array('controller'=>'messages','action'=>'email'));
        }

        if(!empty($data)){
            $Email = new CakeEmail('gmail');
            //$Email->config('gmail');
            $Email->from(array('postmaster.fnp@gmail.com' => "ETHERA Postmaster"));
            $Email->sender('ethera.rjt@gmail.com', 'ETHERA Postmaster');
            $Email->to($data['to']);
            $Email->subject($data['subject']);
            $Email->send($data['body']);

            return true;
        }


    }

    public function industryMail(){

        if($this->request->is('post')){
            if($this->request->data)
            {
                $data = $this->request->data;
                $Email = new CakeEmail('gmail');
                //$Email->config('gmail');
                $Email->from(array('postmaster.fnp@gmail.com' => "ETHERA Postmaster"));
                $Email->sender('ethera.rjt@gmail.com', 'ETHERA Postmaster');
                $Email->to($data['to']);
                $Email->subject($data['subject']);
                $Email->send($data['body']);
            }

            $this->redirect(array('controller'=>'messages','action'=>'email'));
        }

        if(!empty($data)){
            $Email = new CakeEmail('gmail');
            //$Email->config('gmail');
            $Email->from(array('postmaster.fnp@gmail.com' => "ETHERA Postmaster"));
            $Email->sender('ethera.rjt@gmail.com', 'ETHERA Postmaster');
            $Email->to($data['to']);
            $Email->subject($data['subject']);
            $Email->send($data['body']);

            return true;
        }
    }

    public function staffMail(){
        if($this->request->is('post')){
            if($this->request->data)
            {
                $data = $this->request->data;
                $Email = new CakeEmail('gmail');
                //$Email->config('gmail');
                $Email->from(array('postmaster.fnp@gmail.com' => "ETHERA Postmaster"));
                $Email->sender('ethera.rjt@gmail.com', 'ETHERA Postmaster');
                $Email->to($data['to']);
                $Email->subject($data['subject']);
                $Email->send($data['body']);
            }

            $this->redirect(array('controller'=>'messages','action'=>'email'));
        }

        if(!empty($data)){
            $Email = new CakeEmail('gmail');
            //$Email->config('gmail');
            $Email->from(array('postmaster.fnp@gmail.com' => "ETHERA Postmaster"));
            $Email->sender('ethera.rjt@gmail.com', 'ETHERA Postmaster');
            $Email->to($data['to']);
            $Email->subject($data['subject']);
            $Email->send($data['body']);

            return true;
        }

    }
}