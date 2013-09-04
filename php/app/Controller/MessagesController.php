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

        if($this->request->is('post')){
            if($this->request->data){
                $this->loadModel('Student');
                $students = $this->Student->find('list',array(
                    'fields'=>array(
                        'Student.id','Student.first_name'
                    )
                    //'conditions'=>array('Student.batch_id'=>'2')
                ));
                $this->set('students',$students);

            }
        }
        $this->loadModel('Batch');
        $batches = $this->Batch->find('list',array(
            'fields'=>array(
                'Batch.id','Batch.academic_year'
            )
            //'conditions'=>array('Student.batch_id'=>'2')
        ));
        $this->set('batches',$batches);

        $this->loadModel('StudyProgram');
        $study_programs = $this->StudyProgram->find('list',array(
            'fields'=>array(
                'StudyProgram.id','StudyProgram.program_code'
            )
            //'conditions'=>array('Student.batch_id'=>'2')
        ));

        $this->set('study_programs',$study_programs);
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
        $this->loadModel('Organization');
        $organizations = $this->Organization->find('list',array(
            'fields'=>array(
                'Organization.id','Organization.email'
            )
            //'conditions'=>array('Student.batch_id'=>'2')
        ));

        $this->set('organizations',$organizations);
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