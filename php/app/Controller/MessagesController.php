<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor','Dialog/SmsReceiver');
App::import('Vendor','Dialog/SmsSender');

class MessagesController extends AppController {

    public $uses = array();
    public $name = 'Messages';
    public $components = array('RequestHandler');


    public function sms() {

    }

    public function email($data = null) {
    }


    public function studentMail(){
        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');
        $this->loadModel('Student');

        if($this->request->is('post')){
            if($this->request->data)
            {
                $data = $this->request->data;
                $Email = new CakeEmail('gmail');
                //$Email->config('gmail');
                $Email->from(array('postmaster.fnp@gmail.com' => "ETHERA Postmaster"));
                $Email->sender('ethera.rjt@gmail.com', 'ETHERA Postmaster');
//                $Email->to($data['to']);
                $Email->subject($data['subject']);
//                $Email->send($data['body']);
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
            $data = $this->request->data;

        $students = $this->Student->find(
            'all',
            array(
                'conditions' => array(
                    'batch_id' => $data['Batch']['batch_id'],
                    'study_program_id' => $data['Batch']['study_program']
                ),
                'recursive' => -1
            )
        );
            foreach($students as $students);
            {

            }



        }

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



    protected function _save_sms_user($split,$number)

    {
        if (sizeof($split) < 4) {
            $responseMsg = "Invalid message content";
        }

        else {
            $reg_num_header =$split[0];
            $batch = $split[1]."/".$split[2];
            $reg_num = $split[3];

            $this->loadModel('Student');
            $this->loadModel('Batch');
            $this->loadModel('RegistrationNumHeader');

            $batch_found = $this->Batch->find(
                'first',
                array(
                    'conditions' => array(
                        'academic_year' => $batch
                    )
                )
            );

            $reg_num_header_found = $this->RegistrationNumHeader->find(
                'first',
                array(
                    'conditions' => array(
                        'name' => $reg_num_header
                    )
                )
            );

            $student_found = $this->Student->find(
                'first',
                array(
                    'conditions' => array(
                        'batch_id' => $batch_found['Batch']['id'],
                        'Student.registration_num_header_id' => $reg_num_header_found['RegistrationNumHeader']['id'],
                        'reg_number' => $reg_num
                    ),
                    'recursive' => -1
                )
            );

            $save_data['Student']['id'] = $student_found['Student']['id'];
            $save_data['Student']['sms_num'] = $number;

            $this->Student->save($save_data);

            $responseMsg ="Successfully registered. Your number is : ".$number;
        }

        return $responseMsg;
    }

    public function sms_receive(){
        $this->autoRender = false;
        try{
            $data = $this->request->input();

            if($this->request->is('post')){
                $receiver = new SmsReceiver($data);
            }

            $content = $receiver->getMessage(); // get the message content
            $address = $receiver->getAddress(); // get the sender's address
            $requestId = $receiver->getRequestID(); // get the request ID
            $applicationId = $receiver->getApplicationId(); // get application ID
            $encoding = $receiver->getEncoding(); // get the encoding value
            $version = $receiver->getVersion(); // get the version


            $split = explode('/', $content);

            $responseMsg = $this->_save_sms_user($split,$address);

            $sender = new SmsSender("https://localhost:7443/sms/send");

            $applicationId = "APP_000001";
            $encoding = "0";
            $version =  "1.0";
            $password = "password";
            $sourceAddress = "77000";
            $deliveryStatusRequest = "1";
            $charging_amount = ":15.75";
            $destinationAddresses = array("tel:94771122336");
            $binary_header = "";

            $res = $sender->sms($responseMsg, $destinationAddresses, $password, $applicationId, $sourceAddress, $deliveryStatusRequest, $charging_amount, $encoding, $version, $binary_header);
        }

        catch (SmsException $ex){

        }
    }

    public function beforeFilter(){
        parent::beforeFilter();
        if ($this->RequestHandler->accepts('json')) {
        }
        $this->Auth->allow('sms_receive');
    }
}