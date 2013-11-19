<?php
App::uses('AppController', 'Controller');
App::uses('EtheraEmail','Lib');
App::import('Vendor','Dialog/SmsReceiver');
App::import('Vendor','Dialog/SmsSender');

class MessagesController extends AppController {

    public $uses = array();
    public $name = 'Messages';
    public $components = array('RequestHandler');


    public function send_sms($message=null,$user_id=null){

        if($message!=null && $user_id!=null){

            $this->loadModel('Student');
            $student = $this->Student->findById($user_id);

            if($student['Student']['sms_num']!=''){
                $address = $student['Student']['sms_num'];
                try{
                    $sender = new SmsSender("http://api.dialog.lk:8080/sms/send");

                    $applicationId = "APP_004150";
                    $encoding = "0";
                    $version =  "1.0";
                    $password = "3ae55013184a19dcb55c137afa053d19";
                    $sourceAddress = "ETHERA";
                    $deliveryStatusRequest = "0";
                    $charging_amount = "0";
                    $destinationAddresses = $address;
                    $binary_header = "";

                    $res = $sender->sms($message, $destinationAddresses, $password, $applicationId, $sourceAddress, $deliveryStatusRequest, $charging_amount, $encoding, $version, $binary_header);
                }

                catch (SmsException $ex){

                }
            }
        }
    }


    public function sms() {
        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');
        $this->loadModel('Student');

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $batch_study_program = $this->BatchesStudyProgram->find(
                'first',
                array(
                    'conditions' => array(
                        'batch_id' => $data['Batch']['batch_id'],
                        'study_program_id' => $data['Batch']['study_program']
                    ),
                    'recursive' => -1
                )
            );

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

            foreach($students as $student){
                $this->send_sms($data['Batch']['message'],$student['Student']['id']);
            }
        }

        $batches = $this->Batch->find('list');
        $this->set('batches',$batches);
    }


    public function email($data = null) {
    }


    public function student_mail(){
        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');
        $this->loadModel('Student');

        if ($this->request->is('post')) {
            $data = $this->request->data;
            debug($data);

            $batch_study_program = $this->BatchesStudyProgram->find(
                'first',
                array(
                    'conditions' => array(
                        'batch_id' => $data['Batch']['batch_id'],
                        'study_program_id' => $data['Batch']['study_program']
                    ),
                    'recursive' => -1
                )
            );

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


            foreach($students as $student){

                EtheraEmail::mailer($student['Student']['email'],$data['subject'],$data['body']);
            }

        }

        $batches = $this->Batch->find('list');
        $this->set('batches',$batches);


    }


//Need to enhance

    public function industry_mail(){

        $this->loadModel('Organization');
        $organizations = $this->Organization->find('list',array());

        $this->set('organizations',$organizations);

        if($this->request->is('post')){
            if($this->request->data)
            {
                $data = $this->request->data;
                $organization = $this->Organization->findById($data['Organization']['to']);
                EtheraEmail::mailer($organization['Organization']['email'],$data['Organization']['subject'],$data['Organization']['body']);
            }

//                $this->redirect(array('controller'=>'messages','action'=>'email'));
        }


    }


    public function staff_mail(){
        if($this->request->is('post')){
            $data = $this->request->data;
            debug($data);

            EtheraEmail::mailer($data['to'],$data['subject'],$data['body']);
        }
//    debug($data);
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

            $same_number_found = $this->Student->find(
                'all',
                array(
                    'conditions' => array(
                        'sms_num' => $number,
                    ),
                    'recursive' => -1
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
            if(!empty($student_found['Student']['sms_num'])){
                $responseMsg ="Error : Your registration number is already registered";

            }
            else{



            if((!empty($batch_found))||(!empty($student_found))){
                if(!empty($same_number_found)){
                    $responseMsg ="Error: The number you trying to register is already occupied.";
                }
                else {
                    if($student_found['Student']['approved_state'] == 0 || $student_found['Student']['approved_state'] == 9){
                        $responseMsg ="Error : Your are still not got approved as a student in the system. Please wait for the approval.";
                    }
                    else{
                        $save_data['Student']['id'] = $student_found['Student']['id'];
                        $save_data['Student']['sms_num'] = $number;
                        if(!empty($save_data['Student']['id'])){
                            $this->Student->save($save_data);
                            $responseMsg ="Thank you ".$student_found['Student']['last_name']." for registering on ETHERA RUSL. Your student id is : ".$student_found['Student']['id'];
                        }
                        else {
                            $responseMsg ="Error : Your are not registered to the system. Go to Ethera official web site for registration";
                        }
                    }
                }
            }
            else{
                $responseMsg ="Error : Your student registration number is invalid. The correct format is XXX/XXXX/XXXX/XXX";
            }
        }}

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

            $split1 = explode(' ',$content);
            $split2 = explode('/', $split1[1]);

            $responseMsg = $this->_save_sms_user($split2,$address);

            $sender = new SmsSender("http://api.dialog.lk:8080/sms/send");

            $applicationId = "APP_004150";
            $encoding = "0";
            $version =  "1.0";
            $password = "3ae55013184a19dcb55c137afa053d19";
            $sourceAddress = "ETHERA";
            $deliveryStatusRequest = "0";
            $charging_amount = "0";
            $destinationAddresses = array($address);
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