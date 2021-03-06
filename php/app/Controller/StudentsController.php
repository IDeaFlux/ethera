<?php
App::uses('AppController', 'Controller');
App::uses('EtheraEmail','Lib');
App::uses('Calculate','Lib');
App::uses('StudentManipulation','Lib');
App::import('Controller', 'Messages');

class StudentsController extends AppController {

    public $helpers = array('Js');
    public $components = array('Recaptcha.Recaptcha' => array('actions' => array('register')),
        'Paginator'
    );


	public function index() {
		$this->Student->recursive = 0;
		$this->set('students', $this->paginate());
	}


	public function view($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$this->set('student', $this->Student->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->sendData($this->request->data)) {
				$this->Session->setFlash(__('The student has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Student->Group->find('list');
        $registrationNumHeaders = $this->Student->RegistrationNumHeader->find('list');
		$studyPrograms = $this->Student->StudyProgram->find('list');
		$batches = $this->Student->Batch->find('list');
		$this->set(compact('groups', 'studyPrograms', 'batches','registrationNumHeaders'));
	}

    public function register() {
        if ($this->request->is('post')) {
            $this->Student->create();
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('You have been registered successfully'),'success_flash');
                $this->redirect(array('controller'=>'homes','action' => 'main'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            }
        }
        $groups = $this->Student->Group->find('list');
        $registrationNumHeaders = $this->Student->RegistrationNumHeader->find('list');
        $initHeader = $this->Student->RegistrationNumHeader->find('first');
        $initHeader = $initHeader['RegistrationNumHeader']['id'];
        $studyPrograms = $this->Student->StudyProgram->find('list',array(
            'conditions' => array('registration_num_header_id' => $initHeader),
            'recursive' => -1
        ));
        $batches = $this->Student->Batch->find('list');
        $this->set(compact('groups', 'studyPrograms', 'batches','registrationNumHeaders'));
    }


	public function edit($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Student->updateData($this->request->data)) {
				$this->Session->setFlash(__('The student data has been updated'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
			$this->request->data = $this->Student->find('first', $options);
		}
		$groups = $this->Student->Group->find('list');
		$studyPrograms = $this->Student->StudyProgram->find('list');
		$batches = $this->Student->Batch->find('list');
		$this->set(compact('groups', 'studyPrograms', 'batches'));
	}


	public function delete($id = null) {
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Student->deleteData($id)) {
			$this->Session->setFlash(__('Student deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Student was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

    public function enroll(){
        if ($this->request->is('post')) {
            if(!empty($this->request->data['Enrollment']))
            {
                $enrollments = $this->request->data['Enrollment'];
                $count = 0;
                foreach($enrollments as $enrollment){
                    if(empty($enrollment['course_unit_id'])){
                        unset($this->request->data['Enrollment'][$count]);
                    }
                    $count++;
                }
                unset($this->request->data['Student']);
                //debug($this->request->data);
            }
            $this->loadModel('Enrollment');
            $this->Enrollment->create();
            $data = $this->request->data['Enrollment'];
            if ($this->Enrollment->saveAll($data)) {
                $this->Session->setFlash(__('The student has been enrolled in to selected subjects'),'success_flash');
                $this->redirect(array('controller'=>'students','action' => 'enroll'));
            } else {
                $this->Session->setFlash(__('The Enrollments could not be saved. Please, try again.'),'error_flash');
            }
        }
        $registrationNumHeaders = $this->Student->RegistrationNumHeader->find('list');
        $initHeader = $this->Student->RegistrationNumHeader->find('first');
        $initHeader = $initHeader['RegistrationNumHeader']['id'];
        $studyPrograms = $this->Student->StudyProgram->find('list',array(
            'conditions' => array('registration_num_header_id' => $initHeader),
            'recursive' => -1
        ));
        $batches = $this->Student->Batch->find('list');
        $this->set(compact('groups', 'studyPrograms', 'batches','registrationNumHeaders'));
    }

    public function add_marks(){
        if ($this->request->is('post')) {
            $this->loadModel('Enrollment');
            $this->Enrollment->create();
            $data = $this->request->data['Enrollment'];
            if ($this->Enrollment->saveAll($data)) {
                $this->Session->setFlash(__('The student has been enrolled in to selected subjects'),'success_flash');
                //$this->redirect(array('controller'=>'students','action' => 'enroll'));
            } else {
                $this->Session->setFlash(__('The Enrollments could not be saved. Please, try again.'),'error_flash');
            }
        }
        $registrationNumHeaders = $this->Student->RegistrationNumHeader->find('list');
        $initHeader = $this->Student->RegistrationNumHeader->find('first');
        $initHeader = $initHeader['RegistrationNumHeader']['id'];
        $studyPrograms = $this->Student->StudyProgram->find('list',array(
            'conditions' => array('registration_num_header_id' => $initHeader),
            'recursive' => -1
        ));
        $batches = $this->Student->Batch->find('list');
        $this->set(compact('groups', 'studyPrograms', 'batches','registrationNumHeaders'));
    }

    public function get_students_by_batch_and_study_prg(){
        //debug($this->request->data);
        $reg_num_header_id = $this->request->data['Student']['registration_num_header_id'];
        $batch_id = $this->request->data['Student']['batch_id'];
        $students = $this->Student->find('list', array(
            'conditions' => array('registration_num_header_id' => $reg_num_header_id,
                'batch_id' => $batch_id
            ),
            'recursive' => -1
        ));

        $this->set('students',$students);
        $this->layout = 'ajax';
    }

    public function get_student_profile(){
        //debug($this->request->data);
        if(!empty($this->request->data['Student']['reg_number'])) {
            $reg_number = $this->request->data['Student']['reg_number'];
            $student = $this->Student->find('first', array(
                'conditions' => array(
                    'Student.id' => $reg_number
                ),
            ));
            $this->set('student',$student);
        }
        $this->layout = 'ajax';
    }

    public function get_courses(){
        //debug($this->request->data);
        if(!empty($this->request->data['Student']['reg_number'])){
            $student_id = $this->request->data['Student']['reg_number'];
            $student = $this->Student->find('first', array(
                'conditions' => array(
                    'Student.id' => $student_id
                ),
            ));
            $study_program_id = $student['Student']['study_program_id'];
            $this->loadModel('StudyProgramsCourseUnit');
            $this->loadModel('Enrollment');
            $enrollments = $this->Enrollment->find('all', array(
                'conditions' => array(
                    'student_id' => $student_id
                ),
                'recursive' => 1
            ));
            $courses = $students = $this->StudyProgramsCourseUnit->find('all', array(
                'conditions' => array(
                    'study_program_id' => $study_program_id
                ),
                'recursive' => 0
            ));

            $this->set('courses',$courses);
            if(!empty($enrollments)){
                $this->set('enrollments',$enrollments);
            }
            else{
                $this->set('enrollments',array());
            }
            $this->set('student_id',$student_id);
        }

        $this->layout = 'ajax';
    }

    public function get_marking(){
        $student_id = $this->request->data['Student']['reg_number'];
        $this->loadModel('Enrollment');
        $enrollments = $this->Enrollment->find('all', array(
            'conditions' => array(
                'student_id' => $student_id
            ),
            'recursive' => 1
        ));
        $this->set('enrollments',$enrollments);
        $this->set('student_id',$student_id);

        $this->layout = 'ajax';
    }

    public function reg_approval(){
        $this->Paginator->settings = array(
            'conditions' => array(
                'OR' => array(
                    array('approved_state' => 0), // Not approved
                    array('approved_state' => 9)  // Denied
                )),
            'limit' => 20
        );
        $registered_students = $this->Paginator->paginate('Student');
        $this->set('students',$registered_students);
    }

    public function reg_approval_approve($id=null){
        $sms = new MessagesController;
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->onlyAllow('post');
        $data['Student']['id'] = $id;
        $data['Student']['approved_state'] = 1;
        //debug($data);
        if ($this->Student->save($data)) {
            $this->Session->setFlash(__('The student has been approved'),'success_flash');
            $message = "You have been successfully approved from registration of ETHERA";
            $sms->send_sms($message,$id);
            $this->redirect(array('action' => 'reg_approval'));
        } else {
            $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            $this->redirect(array('action' => 'reg_approval'));
        }
    }

    public function reg_approval_disapprove($id=null){
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->onlyAllow('post');
        $data['Student']['id'] = $id;
        $data['Student']['approved_state'] = 9;
        if ($this->Student->save($data)) {
            $this->Session->setFlash(__('The student has been disapproved'),'success_flash');
            $this->redirect(array('action' => 'reg_approval'));
        } else {
            $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            $this->redirect(array('action' => 'reg_approval'));
        }
    }

    public function init_approval(){
        $this->Paginator->settings = array(
            'conditions' => array(
                'OR' => array(
                    array('approved_state' => 2), // Not approved from init
                    array('approved_state' => 8)  // Denied
                )
            ),
            'limit' => 20
        );
        $initial_ready_students = $this->Paginator->paginate('Student');
        $this->set('students',$initial_ready_students);
    }

    public function init_approval_approve($id=null){
        $sms = new MessagesController;
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->onlyAllow('post');
        $data['Student']['id'] = $id;
        $data['Student']['approved_state'] = 3;
        $data['Student']['industry_ready'] = 1;
        if ($this->Student->save($data)) {
            $this->Session->setFlash(__('The student has been approved'),'success_flash');
            $message = "Your CV & Interested areas have been successfully approved by ETHERA.";
            $sms->send_sms($message,$id);
            $this->redirect(array('action' => 'init_approval'));
        } else {
            $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            $this->redirect(array('action' => 'init_approval'));
        }
    }

    public function init_approval_disapprove($id=null){
        $sms = new MessagesController;
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->onlyAllow('post');
        $data['Student']['id'] = $id;
        $data['Student']['approved_state'] = 8;
        if ($this->Student->save($data)) {
            $this->Session->setFlash(__('The student has been disapproved'),'success_flash');
            $message = "Your CV & Interested areas have not been approved by ETHERA. Login for more details";
            $sms->send_sms($message,$id);
            $this->redirect(array('action' => 'init_approval'));
        } else {
            $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            $this->redirect(array('action' => 'init_approval'));
        }
    }

    public function final_approval(){
        $this->Paginator->settings = array(
            'conditions' => array(
                'OR' => array(
                    array('approved_state' => 4), // Not approved from final
                    array('approved_state' => 7)  // Denied
                )
            ),
            'limit' => 20
        );
        $final_ready_students = $this->Paginator->paginate('Student');
        $this->set('students',$final_ready_students);
    }

    public function final_approval_disapprove($id=null){
        $sms = new MessagesController;
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->onlyAllow('post');
        $data['Student']['id'] = $id;
        $data['Student']['approved_state'] = 7;
        if ($this->Student->save($data)) {
            $this->Session->setFlash(__('The student has been disapproved'),'success_flash');
            $message = "Your Organization submission have not been approved by ETHERA. Login for more details";
            $sms->send_sms($message,$id);
            $this->redirect(array('action' => 'final_approval'));
        } else {
            $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            $this->redirect(array('action' => 'final_approval'));
        }
    }

    public function final_approval_approve($id=null){
        $sms = new MessagesController;
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->onlyAllow('post');
        $data['Student']['id'] = $id;
        $data['Student']['approved_state'] = 5;
        if ($this->Student->save($data)) {
            $this->Session->setFlash(__('The student has been approved'),'success_flash');
            $message = "Congratulations! Your organization submission have been approved by ETHERA. Login for more details";
            $sms->send_sms($message,$id);
            $this->redirect(array('action' => 'final_approval'));
        } else {
            $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            $this->redirect(array('action' => 'init_approval'));
        }
    }

    public function approval_phase_select() {
        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');

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
                $student_save['Student']['id'] = $student['Student']['id'];
                $student_save['Student']['approval_phase'] = $data['Batch']['phase'];

                if($this->Student->save($student_save)){
                    continue;
                }
                else{
                    $this->Session->setFlash(__('Could not update. Please, try again.'));
                    break;
                }
            }

            $save_data['BatchesStudyProgram']['id'] = $batch_study_program['BatchesStudyProgram']['id'];
            $save_data['BatchesStudyProgram']['approval_phase'] = $data['Batch']['phase'];
            if ($this->BatchesStudyProgram->save($save_data)) {
                $this->Session->setFlash(__('Approval Phase Updated'),'success_flash');
                $this->redirect(array('action' => 'approval_phase_select'));
            } else {
                $this->Session->setFlash(__('Could not update. Please, try again.'));
            }
        }

        $batches = $this->Batch->find('list');
        $this->set('batches',$batches);
    }

    public function login() {
        if($this->request->is('post')){
            if($this->Auth->login()){
                //$this->redirect($this->Auth->redirectUrl());
                $student = $this->Auth->user();
                if($student['approved_state']==0 || $student['approved_state']==9) {
                    $this->Session->setFlash('Your account not yet approved or it has been disapproved','error_flash');
                    $this->redirect($this->Auth->logout());
                }
                $this->redirect(array('controller'=>'homes','action'=>'student'));
            }
            else{
                $this->Session->setFlash('Your email & password combination is incorrect','error_flash');
            }
        }
    }

    public function my_profile(){
        $current_student = $this->Auth->user();
        $this->set('student',$current_student['id']);

        if($current_student['approval_phase'] == 1 || $current_student['approval_phase'] == 2) {
            if($current_student['freeze_state']==0) {
                $enable = 1;
            }
            else {
                $enable = 0;
            }
        }
        else {
            $enable = 0;
        }

        $this->set('enable',$enable);
    }

    public function edit_my_profile($id=null) {
        $current_student = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        elseif($id != $current_student['id']) {
            $this->redirect(array('action' => 'my_profile'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('The student data has been updated'),'success_flash');
                $this->redirect(array('action' => 'my_profile'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            }
        } else {
            $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
            $this->request->data = $this->Student->find('first', $options);
        }

    }

    public function update_my_photo($id=null){
        $current_student = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        elseif($id != $current_student['id']) {
            $this->redirect(array('action' => 'my_profile'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Student->updateData($this->request->data)) {
                $this->Session->setFlash(__('The photo has been updated'),'success_flash');
                $this->redirect(array('action' => 'my_profile'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            }
        }

        $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$current_student['id']),'recursive'=>0));
        $this->set('student',$student);
    }

    public function edit_my_password($id=null){
        $current_student = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        elseif($id != $current_student['id']) {
            $this->redirect(array('action' => 'my_profile'));
        }

        if($this->request->is('post')||$this->request->is('put')){
            if($this->Student->savePassword($this->request->data)){
                $this->Session->setFlash(__('Your password has been updated'),'success_flash');
                $this->redirect(array('action' => 'my_profile'));
            }
            else {
                $this->Session->setFlash(__('The new password could not be saved. Please, try again.'),'error_flash');
            }
        }

        $this->set('id',$id);
    }

    public function my_cv_data($id=null) {
        $current_student = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        elseif($id != $current_student['id']) {
            $this->redirect(array('action' => 'my_profile'));
        }
        elseif($current_student['approval_phase'] != 1 && $current_student['approval_phase'] != 2) {
            $this->redirect(array('action' => 'my_profile'));
        }
        elseif($current_student['freeze_state']!=0) {
            $this->redirect(array('action' => 'my_profile'));
        }
        elseif($current_student['approval_phase'] == 2) {
            $this->redirect(array('controller' => 'students','action' => 'my_cv_data_upl',$id));
        }

        $this->loadModel('Assignment');
        $this->loadModel('InterestedArea');
        $this->loadModel('Cv');

        $student = $this->Student->find(
            'first', array(
                'conditions' => array(
                    'Student.id' => $id
                )
            )
        );

        $interested_areas_pre = $this->InterestedArea->StudyProgram->find(
            'all',array(
                'conditions' => array(
                    'StudyProgram.id'=> $student['Student']['study_program_id']
                ),
                'contain' => array(
                    'InterestedArea' => array(
                    )
                )
            )
        );

        $current_submissions_pre = $this->Assignment->find(
            'all',
            array(
                'conditions' => array(
                    'student_id' => $id
                ),
                'recursive' => 1,
                'order' => 'Assignment.priority ASC'
            )
        );

        $count = 0;
        foreach($current_submissions_pre as $current_submission_pre){
            $current_submissions[$count]['name'] = $current_submission_pre['InterestedArea']['name'];
            $current_submissions[$count]['priority'] = $current_submission_pre['Assignment']['priority'];
            $count++;
        }

        $interested_areas_pre = $interested_areas_pre[0]['InterestedArea'];

        foreach($interested_areas_pre as $interested_area_pre){
            $interested_areas[$interested_area_pre['id']] = $interested_area_pre['name'];
        }

        $this->set(compact('interested_areas','current_submissions'));
        if($this->request->is('post')){
            $assignments = $this->request->data['Assignment'];
            $count = 1;
            foreach($assignments as $assignment){
                if(!empty($assignment['interested_area_id'])){
                    $data[$count-1]['Assignment']['interested_area_id'] = $assignment['interested_area_id'];
                    $data[$count-1]['Assignment']['student_id'] = $id;
                    $data[$count-1]['Assignment']['priority'] = $count;
                    $data[$count-1]['Assignment']['state'] = 1;
                    if(!empty($current_submissions_pre[$count-1]['Assignment']['priority']) && $current_submissions_pre[$count-1]['Assignment']['priority'] == $count){
                        $data[$count-1]['Assignment']['id'] = $current_submissions_pre[$count-1]['Assignment']['id'];
                    }
                }
                else{
                    if(!empty($current_submissions_pre[$count-1]['Assignment']['priority']) && $current_submissions_pre[$count-1]['Assignment']['priority'] == $count){
                        $this->Assignment->id = $current_submissions_pre[$count-1]['Assignment']['id'];
                        $this->Assignment->delete();
                    }
                }
                $count++;
            }

            if($id){
                $std['Student']['id'] = $id;
                $std['Student']['approved_state'] = 2;
            }

            if(($this->Assignment->saveAll($data))&&($this->Student->saveAll($std))) {
                $this->Session->setFlash(__('Your CV Data updated'),'success_flash');
                $this->redirect(array('action' => 'my_profile'));
            }
            else {
                $this->Session->setFlash(__('Your CV Data update failed'),'error_flash');
                $this->redirect(array('action' => 'my_profile'));
            }
        }
    }

    public function my_cv_data_upl($id=null) {

        $current_student = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        elseif($id != $current_student['id']) {
            $this->redirect(array('action' => 'my_profile'));
        }
        elseif($current_student['approval_phase'] != 2) {
            $this->redirect(array('action' => 'my_profile'));
        }
        elseif($current_student['freeze_state']!=0) {
            $this->redirect(array('action' => 'my_profile'));
        }

        $this->loadModel('Organization');
        $this->loadModel('Opportunity');
        $this->loadModel('Assignment');
        $this->loadModel('InterestedArea');

        $current_submissions_pre = $this->Assignment->find(
            'all',
            array(
                'conditions' => array(
                    'student_id' => $id
                ),
                'recursive' => 1,
                'order' => 'Assignment.priority ASC'
            )
        );

        if($this->request->is('post') && !empty($id)){
            if($id){
                $std['Student']['id'] = $id;
                $std['Student']['approved_state'] = 4;
            }

            $assignments = $this->request->data['Assignment'];

            $count = 0;
            foreach($assignments as $assignment){
                $data[$count]['Assignment']['id'] = $assignment['id'];
                $data[$count]['Assignment']['organization_id'] = $assignment['organization_id'];
                if($assignment['organization_id']==''){
                    $data[$count]['Assignment']['state'] = 1;
                }
                else{
                    $data[$count]['Assignment']['state'] = 2;
                }
                $count++;
            }

            if(($this->Assignment->saveAll($data))&&($this->Student->saveAll($std))) {
                $this->Session->setFlash(__('Your CV Data updated'),'success_flash');
                $this->redirect(array('action' => 'my_profile'));
            }
            else {
                $this->Session->setFlash(__('Your CV Data update failed'),'error_flash');
                $this->redirect(array('action' => 'my_profile'));
            }
        }

        if(!empty($current_submissions_pre)){
            $count = 0;
            foreach($current_submissions_pre as $current_submission_pre){
                $priority = $current_submission_pre['Assignment']['priority'];

                for($i=1;$i<=3;$i++){
                    if($priority == $i){
                        ${'opp_list_'.$i} = $this->Opportunity->find('list',array(
                            'conditions' => array(
                                'batch_id' => $current_submission_pre['Student']['batch_id'],
                                'interested_area_id' => $current_submission_pre['Assignment']['interested_area_id'],
                                'study_program_id' => $current_submission_pre['Student']['study_program_id']
                            ),
                            'fields' => 'Opportunity.organization_id'
                        ));
                        if(${'opp_list_'.$i}){
                            ${'org_list_'.$i} = $this->Organization->find(
                                'list',
                                array(
                                    'conditions' => array(
                                        'Organization.id' => ${'opp_list_'.$i}
                                    )
                                )
                            );
                        }
                    }
                }

                $current_submissions[$count]['name'] = $current_submission_pre['InterestedArea']['name'];
                $current_submissions[$count]['priority'] = $current_submission_pre['Assignment']['priority'];
                if(!empty($current_submission_pre['Assignment']['organization_id'])){
                    $org = $this->Organization->findById($current_submission_pre['Assignment']['organization_id']);
                    $current_submissions[$count]['organization'] = $org['Organization']['name'];
                }
                else{
                    $current_submissions[$count]['organization'] = '';
                }

                for($i=1;$i<=3;$i++){
                    if($priority == $i){
                        ${'current_submissions_p_'.$i}['id'] = $current_submission_pre['Assignment']['id'];
                        ${'current_submissions_p_'.$i}['name'] = $current_submission_pre['InterestedArea']['name'];
                        ${'current_submissions_p_'.$i}['priority'] = $current_submission_pre['Assignment']['priority'];
                    }
                }
                $count++;
            }

            for($i=1;$i<=3;$i++){
                if(!empty(${'org_list_'.$i})){
                    $this->set('org_list_'.$i,${'org_list_'.$i});
                }
                if(!empty(${'current_submissions_p_'.$i})){
                    $this->set('current_submissions_p_'.$i,${'current_submissions_p_'.$i});
                }
            }

            if(!empty($current_submissions)){
                $this->set('current_submissions',$current_submissions);
            }
        }
    }

    public function freeze_unfreeze() {
        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');

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
                $student_save['Student']['id'] = $student['Student']['id'];
                $student_save['Student']['freeze_state'] = $data['Batch']['freeze_state'];

                if($this->Student->save($student_save)){
                    continue;
                }
                else{
                    $this->Session->setFlash(__('Could not update. Please, try again.'));
                    break;
                }
            }

            $save_data['BatchesStudyProgram']['id'] = $batch_study_program['BatchesStudyProgram']['id'];
            $save_data['BatchesStudyProgram']['freeze_state'] = $data['Batch']['freeze_state'];
            if ($this->BatchesStudyProgram->save($save_data)) {
                $this->Session->setFlash(__('Freeze State Updated'),'success_flash');
                $this->redirect(array('action' => 'freeze_unfreeze'));
            } else {
                $this->Session->setFlash(__('Could not update. Please, try again.'));
            }
        }

        $batches = $this->Batch->find('list');
        $this->set('batches',$batches);
    }

    public function filter_by_name(){

    }

    public function filter_by_id(){

    }

    public function get_students_by_reg_number(){
        if(!empty($this->request->data['Student']['query'])){
            $content = $this->request->data['Student']['query'];

            $split = explode('/',$content);

            if(sizeof($split) == 4) {
                $reg_num_header =$split[0];
                $batch = $split[1]."/".$split[2];
                $reg_num = $split[3];

                $this->loadModel('Student');
                $this->loadModel('Batch');
                $this->loadModel('RegistrationNumHeader');

                $students = $this->Student->find(
                    'all',
                    array(
                        'joins' => array(
                            array(
                                'table' => 'batches',
                                'alias' => 'BatchJoin',
                                'type' => 'INNER',
                                'conditions' => array(
                                    "BatchJoin.academic_year LIKE '%$batch%'"
                                )
                            ),
                            array(
                                'table' => 'registration_num_headers',
                                'alias' => 'RegistrationNumHeaderJoin',
                                'type' => 'INNER',
                                'conditions' => array(
                                    "RegistrationNumHeaderJoin.name" => $reg_num_header
                                )
                            )
                        ),
                        'fields' => array('Student.*'),
                        'conditions' => array(
                            "Student.reg_number LIKE '%$reg_num%'"
                        )
                    )
                );

                $this->set('students',$students);
            }
        }

        $this->layout = 'ajax';
    }

    public function get_students_by_name(){
        if(!empty($this->request->data['Student']['search'])) {
            $keyword = $this->request->data['Student']['search'];

            $conditions = array('OR'=>array("Student.first_name LIKE '%$keyword%'","Student.middle_name LIKE '%$keyword%'", "Student.last_name LIKE '%$keyword%'")  );

            $students = $this->Student->find(
                'all',
                array(
                    'conditions' => $conditions,
                    'recursive' => -1
                )
            );
            $this->set('students',$students);
        }
        $this->layout = 'ajax';
    }

    public function filter_by_academic_performance() {

        $this->loadModel('Batch');
        $this->loadModel('StudyProgram');
        $this->loadModel('BatchesStudyProgram');

        $batches = $this->Batch->find('list');
        $init_batch = $this->Batch->find('first');


        $study_programs_batches = $this->Batch->BatchesStudyProgram->find('all', array(
            'conditions' => array('batch_id' => $init_batch['Batch']['id']),
            'recursive' => -1
        ));
        if(!empty($study_programs_batches)){
            foreach($study_programs_batches as $study_programs_batch){
                $study_program_id = $study_programs_batch['BatchesStudyProgram']['study_program_id'];
                $study_program_full = $this->StudyProgram->find('first',array(
                    'conditions' => array('id' => $study_program_id),
                    'recursive' => -1
                ));
                $studyPrograms[$study_program_id] = $study_program_full['StudyProgram']['program_code'];
            };
        }
        else{
            $studyPrograms = array();
        }

        $this->set(compact('studyPrograms', 'batches'));
    }

    public function filter_by_academic_performance_course_select(){
        if($this->request->is('post')) {
            $this->loadModel('StudyProgramsCourseUnit');
            $this->loadModel('CourseUnit');
            $this->loadModel('Subject');

            $study_program_id = $this->request->data['Student']['study_program'];
            $courses = $this->StudyProgramsCourseUnit->find('all', array(
                'conditions' => array(
                    'study_program_id' => $study_program_id
                ),
                'recursive' => 1
            ));

            $subjects = $this->Subject->find('all', array(
                'recursive' => -1,
                )
            );

            $this->set('courses',$courses);
            $this->set('subjects',$subjects);
            $this->set('batch',$this->request->data['Batch']['batch_id']);
            $this->set('study_program',$this->request->data['Student']['study_program']);
        }
    }

    public function filter_by_academic_performance_course_select_filtering(){
        $this->loadModel('Enrollment');
        $this->loadModel('CourseUnit');

        if($this->request->is('post')){
            if((!empty($this->request->data['CourseUnit'])) && (!empty($this->request->data['Batch']['id'])) && (!empty($this->request->data['StudyProgram']['id']))){
                $course_units = $this->request->data['CourseUnit'];

                $students = $this->Student->find(
                    'all',
                    array(
                        'recursive' => -1,
                        'conditions' => array(
                            'Student.batch_id' => $this->request->data['Batch']['id'],
                            'Student.study_program_id' => $this->request->data['StudyProgram']['id']
                        )
                    )
                );
                $student_count = 0;
                foreach($students as $student){
                    $filtering_enrollments = array();

                    $enrollments = $this->Enrollment->find(
                        'all',
                        array(
                            'recursive' => -1,
                            'conditions' => array(
                                'Enrollment.student_id' => $student['Student']['id']
                            )
                        )
                    );

                    $course_count = 0;

                    foreach($enrollments as $enrollment){
                        foreach($course_units as $course_unit){
                            if(($enrollment['Enrollment']['course_unit_id'] == $course_unit['id']) && (!empty($enrollment['Enrollment']['grade']))){
                                $course_count++;
                                $unit = $this->CourseUnit->find(
                                    'first',
                                    array(
                                        'conditions' => array(
                                            'CourseUnit.id' => $enrollment['Enrollment']['course_unit_id']
                                        ),
                                        'recursive' => -1
                                    )
                                );
                                $enrollment['Enrollment']['CourseUnit'] = $unit['CourseUnit'];
                                $filtering_enrollments[$course_count-1]= $enrollment;


                            }
                        }
                    }

                    if($course_count == sizeof($course_units)){
                        $filtered_students[$student_count]['Student']['filter_gpa'] = Calculate::GPA($filtering_enrollments);
                        $filtered_students[$student_count]['Student']['id'] = $student['Student']['id'];
                    }
                    $student_count++;
                }

                if(!empty($filtered_students)){
                    $filtered_student_count = 0;
                    foreach($filtered_students as $filtered_student){
                        $final_students[$filtered_student_count] = $this->Student->find(
                            'first',
                            array(
                                'conditions' => array(
                                    'Student.id' => $filtered_student['Student']['id']
                                ),
                                'recursive' => -1
                            )
                        );
                        $final_students[$filtered_student_count]['GPA'] = $filtered_student['Student']['filter_gpa'];
                        $filtered_student_count++;
                    }
                }
            }
            if(!empty($final_students)){
                $students = StudentManipulation::gpa_sort($final_students);
                $this->set('students',$students);
            }

            $this->set('return_data',$this->request->data);
        }
    }

    public function industry_ready(){
        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');

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

//            foreach($students as $student){
//                $student_save['Student']['id'] = $student['Student']['id'];
//                $student_save['Student']['industry_ready'] = $data['Batch']['industry_ready'];
//
//                if($this->Student->save($student_save)){
//                    continue;
//                }
//                else{
//                    $this->Session->setFlash(__('Could not update. Please, try again.'));
//                    break;
//                }
//            }

            $save_data['BatchesStudyProgram']['id'] = $batch_study_program['BatchesStudyProgram']['id'];
            $save_data['BatchesStudyProgram']['industry_ready'] = $data['Batch']['industry_ready'];
            if ($this->BatchesStudyProgram->save($save_data)) {
                $this->Session->setFlash(__('Public Readiness State Updated'),'success_flash');
                $this->redirect(array('action' => 'industry_ready'));
            } else {
                $this->Session->setFlash(__('Could not update. Please, try again.'));
            }
        }

        $batches = $this->Batch->find('list');
        $this->set('batches',$batches);
    }

    public function list_students(){
        $this->loadModel('Batch');
        $this->loadModel('StudyProgram');
        $this->loadModel('BatchesStudyProgram');

        $batches = $this->Batch->find('list');
        $init_batch = $this->Batch->find('first');


        $study_programs_batches = $this->Batch->BatchesStudyProgram->find('all', array(
            'conditions' => array('batch_id' => $init_batch['Batch']['id']),
            'recursive' => -1
        ));
        if(!empty($study_programs_batches)){
            foreach($study_programs_batches as $study_programs_batch){
                $study_program_id = $study_programs_batch['BatchesStudyProgram']['study_program_id'];
                $study_program_full = $this->StudyProgram->find('first',array(
                    'conditions' => array('id' => $study_program_id),
                    'recursive' => -1
                ));
                $studyPrograms[$study_program_id] = $study_program_full['StudyProgram']['program_code'];
            };
        }
        else{
            $studyPrograms = array();
        }

        $this->set(compact('studyPrograms', 'batches'));
    }

    public function list_students_index() {

        if($this->request->is('post')){
            $this->loadModel('Batch');
            $this->loadModel('StudyProgram');

            $current_student = $this->Auth->user();

            $batch_id = $this->request->data['Batch']['batch_id'];
            $study_program_id = $this->request->data['Student']['study_program'];

            $students = $this->Student->find('all',array(
                    'conditions' => array(
                        'study_program_id' => $study_program_id,
                        'batch_id' => $batch_id
                    ),
                    'recursive' => 1
                )
            );

            $batch = $this->Batch->findById($batch_id);
            $study_program = $this->StudyProgram->findById($study_program_id);

            $this->set('current_student',$current_student);
            $this->set('students',$students);
            $this->set('batch',$batch);
            $this->set('study_program',$study_program);
        }
        else{
            $this->redirect(array('action'=>'list_students'));
        }
    }

    public function individual_configuration($id=null){
        $current_student = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        if($this->request->is('post')||$this->request->is('put')){
            if($this->Student->save($this->request->data)){
                $this->Session->setFlash(__('Student Configuration Updated'),'success_flash');
                $this->redirect(array('action' => 'list_students'));
            }
            else{
                $this->Session->setFlash(__('Student Configuration update failed'),'error_flash');
            }
        }
        else{
            $student = $this->Student->findById($id);

            $this->request->data = $student;
            $this->set('student',$student);
        }
    }

    public function my_extra_activities($id=null) {
        $current_student = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        elseif($id != $current_student['id']) {
            $this->redirect(array('action' => 'my_profile'));
        }
        elseif($current_student['freeze_state']!=0) {
            $this->redirect(array('action' => 'my_profile'));
        }

        if($this->request->is('post')){
            debug($this->request->data);
            $this->loadModel('StudentsExtraActivity');

            $this->StudentsExtraActivity->create();
            $data = $this->request->data;
            $data_sea = $data['StudentsExtraActivity'];
            $count = 0;
            foreach ($data_sea as $record){
                if($record['comment'] == ''){
                    unset($data['StudentsExtraActivity'][$count]);
                }
                $count++;
            }

            $data = $data['StudentsExtraActivity'];

            $count = 0;
            foreach($data as $record){
                if(!empty($record['id'])){
                    $data_save[$count]['StudentsExtraActivity']['id'] = $record['id'];
                }
                $data_save[$count]['StudentsExtraActivity']['student_id'] = $record['student_id'];
                $data_save[$count]['StudentsExtraActivity']['extra_activity_id'] = $record['extra_activity_id'];
                $data_save[$count]['StudentsExtraActivity']['comment'] = $record['comment'];
                $count++;
            }


            if($this->StudentsExtraActivity->saveAll($data_save)){
                $this->Session->setFlash(__('Your Extra Activity details updated'),'success_flash');
                $this->redirect(array('action' => 'my_profile'));
            }
            else{
                $this->Session->setFlash(__('Your Extra Activity details update failed'),'error_flash');
            }
        }

        $this->loadModel('StudentsExtraActivity');
        $this->loadModel('ExtraActivity');

        $student_extra_activities = $this->StudentsExtraActivity->find(
            'all',
            array(
                'conditions' => array(
                    'student_id' => $id
                )
            )
        );
        $extra_activities = $this->ExtraActivity->find('all');
        $student = $current_student;
        $this->set(compact('extra_activities','student','student_extra_activities'));
    }

    public function student_profile_router($id=null){
        $user = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }

        if(!empty($user)){
            if($user['group_id']==1||$user['group_id']==2){
                $this->redirect(array('action' => 'view_admin',$id));
            }
            if($user['group_id']==5){
                $this->redirect(array('action' => 'view_industry',$id));
            }
            if($user['group_id']==4){
                $this->redirect(array('action' => 'view_student',$id));
            }
            if($user['group_id']==6){
                $this->redirect(array('action' => 'view_ar',$id));
            }
        }
        else{
            $this->redirect(array('action' => 'view_public',$id));
        }
    }

    public function view_admin($id=null){
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$id),'recursive'=>'2'));
//        debug($student);

        //setting GPA
        $enrollments = $student['Enrollment'];
        $count = 0;

        foreach($enrollments as $enrollment){
            $gpa_enrollments[$count]['Enrollment'] = $enrollment;
            $count++;
        }

        $gpa = Calculate::GPA($gpa_enrollments);

        //Setting Extra Activities
        $extra_activities = $student['StudentsExtraActivity'];
        $ea_value = Calculate::ExtraActivities($extra_activities);

        //Setting Final Value
        $final_value = Calculate::FinalMark($gpa,$ea_value);

        $this->set('student',$student);
        $this->set('gpa',$gpa);
        $this->set('ea_value',$ea_value);
        $this->set('final_value',$final_value);
    }

    public function view_industry($id=null){
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$id),'recursive'=>'2'));
//        debug($student);

        //setting GPA
        $enrollments = $student['Enrollment'];
        $count = 0;
        foreach($enrollments as $enrollment){
            $gpa_enrollments[$count]['Enrollment'] = $enrollment;
            $count++;
        }
        $gpa = Calculate::GPA($gpa_enrollments);

        //Setting Extra Activities
        $extra_activities = $student['StudentsExtraActivity'];
        $ea_value = Calculate::ExtraActivities($extra_activities);

        //Setting Final Value
        $final_value = Calculate::FinalMark($gpa,$ea_value);

        $this->set('student',$student);
        $this->set('gpa',$gpa);
        $this->set('ea_value',$ea_value);
        $this->set('final_value',$final_value);
    }

    public function view_student($id=null){
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$id),'recursive'=>'2'));
//        debug($student);

        //setting GPA
        $enrollments = $student['Enrollment'];
        $count = 0;
        foreach($enrollments as $enrollment){
            $gpa_enrollments[$count]['Enrollment'] = $enrollment;
            $count++;
        }
        $gpa = Calculate::GPA($gpa_enrollments);

        //Setting Extra Activities
        $extra_activities = $student['StudentsExtraActivity'];
        $ea_value = Calculate::ExtraActivities($extra_activities);

        //Setting Final Value
        $final_value = Calculate::FinalMark($gpa,$ea_value);

        $this->set('student',$student);
        $this->set('gpa',$gpa);
        $this->set('ea_value',$ea_value);
        $this->set('final_value',$final_value);
    }

    public function view_ar($id=null){
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$id),'recursive'=>'2'));
//        debug($student);

        //setting GPA
        $enrollments = $student['Enrollment'];
        $count = 0;
        foreach($enrollments as $enrollment){
            $gpa_enrollments[$count]['Enrollment'] = $enrollment;
            $count++;
        }
        $gpa = Calculate::GPA($gpa_enrollments);

        //Setting Extra Activities
        $extra_activities = $student['StudentsExtraActivity'];
        $ea_value = Calculate::ExtraActivities($extra_activities);

        //Setting Final Value
        $final_value = Calculate::FinalMark($gpa,$ea_value);

        $this->set('student',$student);
        $this->set('gpa',$gpa);
        $this->set('ea_value',$ea_value);
        $this->set('final_value',$final_value);
    }

    public function view_public($id=null){
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$id),'recursive'=>'2'));
//        debug($student);

        //setting GPA
        $enrollments = $student['Enrollment'];
        $count = 0;
        foreach($enrollments as $enrollment){
            $gpa_enrollments[$count]['Enrollment'] = $enrollment;
            $count++;
        }
        $gpa = Calculate::GPA($gpa_enrollments);

        //Setting Extra Activities
        $extra_activities = $student['StudentsExtraActivity'];
        $ea_value = Calculate::ExtraActivities($extra_activities);

        //Setting Final Value
        $final_value = Calculate::FinalMark($gpa,$ea_value);

        $this->set('student',$student);
        $this->set('gpa',$gpa);
        $this->set('ea_value',$ea_value);
        $this->set('final_value',$final_value);
    }

    public function extra_activity_marks($id=null){
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }

        if($this->request->is('post')){
            $this->loadModel('StudentsExtraActivity');

            $data = $this->request->data['StudentsExtraActivity'];

            $count = 0;
            foreach($data as $record){
                $data_save[$count]['StudentsExtraActivity']['id'] = $record['id'];
                $data_save[$count]['StudentsExtraActivity']['mark'] = $record['mark'];
                $count++;
            }

            if($this->StudentsExtraActivity->saveAll($data_save)){
                $this->Session->setFlash(__('Extra Activity details updated'),'success_flash');
                $this->redirect(array('action' => 'student_profile_router',$id));
            }
            else{
                $this->Session->setFlash(__('Extra Activity details update failed'),'error_flash');
            }
        }

        $this->loadModel('StudentsExtraActivity');
        $this->loadModel('ExtraActivity');

        $student = $this->Student->findById($id);
        $student_extra_activities = $this->StudentsExtraActivity->find(
            'all',
            array(
                'conditions' => array(
                    'student_id' => $id
                )
            )
        );
        $extra_activities = $this->ExtraActivity->find('all');

        $this->set(compact('extra_activities','student','student_extra_activities'));
    }

    //Start of Algorithmic Processing
    public function select_processing_set() {
        $this->loadModel('Batch');
        $this->loadModel('StudyProgram');
        $this->loadModel('BatchesStudyProgram');

        $batches = $this->Batch->find('list');
        $init_batch = $this->Batch->find('first');


        $study_programs_batches = $this->Batch->BatchesStudyProgram->find('all', array(
            'conditions' => array('batch_id' => $init_batch['Batch']['id']),
            'recursive' => -1
        ));
        if(!empty($study_programs_batches)){
            foreach($study_programs_batches as $study_programs_batch){
                $study_program_id = $study_programs_batch['BatchesStudyProgram']['study_program_id'];
                $study_program_full = $this->StudyProgram->find('first',array(
                    'conditions' => array('id' => $study_program_id),
                    'recursive' => -1
                ));
                $studyPrograms[$study_program_id] = $study_program_full['StudyProgram']['program_code'];
            };
        }
        else{
            $studyPrograms = array();
        }

        $this->set(compact('studyPrograms', 'batches'));
    }

    public function processing(){
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                $batch_id = $this->request->data['Batch']['batch_id'];
                $study_program_id = $this->request->data['Student']['study_program'];

                $students = $this->Student->find(
                    'all',
                    array(
                        'conditions' => array(
                            'Student.batch_id' => $batch_id,
                            'Student.study_program_id' => $study_program_id,
                        ),
                        'recursive' => 2
                    )
                );

                if(!empty($students)){
                    $student_count = 0;
                    foreach($students as $student){

                        if($student['Student']['approved_state']==5){

                            //GPA
                            $enrollments = $student['Enrollment'];

                            if(!empty($enrollments)){
                                $count = 0;
                                foreach($enrollments as $enrollment){
                                    $gpa_enrollments[$count]['Enrollment'] = $enrollment;
                                    $count++;
                                }

                                $gpa = Calculate::GPA($gpa_enrollments);
                            }

                            //EA
                            $extra_activities = $student['StudentsExtraActivity'];
                            if(!empty($extra_activities)){
                                $ea_value = Calculate::ExtraActivities($extra_activities);
                            }

                            //Overall
                            if(!empty($gpa)&&!empty($ea_value)){
                                $final_value = Calculate::FinalMark($gpa,$ea_value);
                            }

                            if(!empty($final_value)){
                                $students_selected_to_sort_asc[$student_count]['id'] = $student['Student']['id'];
                                $students_selected_to_sort_asc[$student_count]['GPA'] = $final_value;
                            }

                            $student_count++;
                        }
                    }

                    $students_sorted_asc = StudentManipulation::gpa_sort($students_selected_to_sort_asc);

                    $students_after_algorithm_run = array();
                    $final_students_count = 0;

                    //debug($students_sorted_asc);
                    if(!empty($students_sorted_asc)){
                        $this->loadModel('Organization');
                        $this->loadModel('Opportunity');
                        $this->loadModel('Assignment');
                        $this->loadModel('InterestedArea');

                        foreach($students_sorted_asc as $student_sorted){
                            $assignments_for_student = $this->Assignment->find(
                                'all',
                                array(
                                    'conditions' => array(
                                        'student_id' => $student_sorted['id']
                                    ),
                                    'recursive' => 2,
                                    'order' => 'Assignment.priority ASC'
                                )
                            );

                            $student_sorted_full_details = $this->Student->findById($student_sorted['id']);

                            //debug($student_sorted_full_details);
                            //debug($assignments_for_student);

                            if(!empty($assignments_for_student)&&($student_sorted_full_details['Student']['processing_state']==0||$student_sorted_full_details['Student']['processing_state']==9)){

                                $student_sorted['never_consider_this_student_for_next_assignment']=0;

                                foreach($assignments_for_student as $assignment){ //Level of checking assignment 1 by 1
                                    //debug($assignment);

                                    if($student_sorted['never_consider_this_student_for_next_assignment']!=1){

                                        if($assignment['Assignment']['state']==2||$assignment['Assignment']['state']==9||$assignment['Assignment']['state']==8){
                                            $applicable_organization = $assignment['Organization'];

                                            if(!empty($applicable_organization)){
                                                //debug($applicable_organization);

                                                $opportunities_given_by_org = $applicable_organization['Opportunity'];
                                                if(!empty($opportunities_given_by_org)){
                                                    foreach($opportunities_given_by_org as $opportunity){
                                                        //debug($opportunity);

                                                        if(
                                                            ($opportunity['batch_id']==$student_sorted_full_details['Student']['batch_id'])
                                                            &&
                                                            ($opportunity['study_program_id']==$student_sorted_full_details['Student']['study_program_id'])
                                                            &&
                                                            ($opportunity['interested_area_id']==$assignment['Assignment']['interested_area_id'])
                                                            &&
                                                            ($opportunity['slots']>0)
                                                        )
                                                        {
                                                            if(($opportunity['slots']>$opportunity['consumed_slots'])){
                                                                $assignment_to_update['Assignment']['id'] = $assignment['Assignment']['id'];
                                                                $assignment_to_update['Assignment']['state'] = 3;

                                                                if($this->Assignment->save($assignment_to_update)){
                                                                    $assignment_to_update = array();
                                                                    $opportunity_to_update['Opportunity']['id'] = $opportunity['id'];
                                                                    $opportunity_to_update['Opportunity']['consumed_slots'] = $opportunity['consumed_slots']+1;

                                                                    if($this->Opportunity->save($opportunity_to_update)){
                                                                        $opportunity_to_update = array();
                                                                        $student_sorted['never_consider_this_student_for_next_assignment']=1;
                                                                        $students_after_algorithm_run[$final_students_count]['Student']['id'] = $student_sorted['id'];
                                                                        $final_students_count++;
                                                                    }
                                                                }
                                                            }
                                                            else{
                                                                $assignment_to_update['Assignment']['id'] = $assignment['Assignment']['id'];
                                                                $assignment_to_update['Assignment']['state'] = 9;

                                                                $this->Assignment->save($assignment_to_update);
                                                                $assignment_to_update = array();
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }

                                if($student_sorted['never_consider_this_student_for_next_assignment']==0){
                                    $student_to_update['Student']['id'] = $student_sorted['id'];
                                    $student_to_update['Student']['processing_state'] = 9;

                                    $this->Student->save($student_to_update);
                                }
                                elseif($student_sorted['never_consider_this_student_for_next_assignment']==1){
                                    $student_to_update['Student']['id'] = $student_sorted['id'];
                                    $student_to_update['Student']['processing_state'] = 1;

                                    $this->Student->save($student_to_update);
                                }
                            }
                        }
                    }
                    $students_to_set = array();
                    $set_count = 0;
                    if(!empty($students_after_algorithm_run)){
                        foreach($students_after_algorithm_run as $student_final){
                            $students_to_set[$set_count] = $this->Student->find('first',array('conditions'=>array('Student.id'=>$student_final['Student']['id']),'recursive'=>2));
                            $set_count++;
                        }
                    }

                    $this->set('students',$students_to_set);
                }
            }
            else{
                $this->redirect(array('action' => 'select_processing_set'));
            }
        }
        else{
            $this->redirect(array('action' => 'select_processing_set'));
        }
    }

    public function update_interview_results($id=null){
        $current_student = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        elseif($id != $current_student['id']) {
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }

        $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$id),'recursive'=>2));

        $assignments = $student['Assignment'];
        $have_interview = false;

        if(!empty($assignments)){
            foreach($assignments as $assignment){
                if($assignment['state']==3){
                    $have_interview = true;
                    break;
                }
            }
        }

        if($have_interview==false){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }

        $this->set('student',$student);

        if($this->request->is('post')){
            $this->loadModel('Assignment');
            if($this->request->data['Assignment']['state']==4){
                $data['Student']['industry_ready']=0;
                $data['Student']['id']=$current_student['id'];
            }
            if($this->Assignment->save($this->request->data) && $this->Student->save($data)){
                $this->Session->setFlash('Your Preference Saved','success_flash');
                $this->redirect(array('controller'=>'homes','action'=>'backend_router'));
            }
            else{
                $this->Session->setFlash('Your Preference Could not be saved.','error_flash');
            }
        }
    }

    public function show(){
        $students = $this->Student->find('all',array('conditions'=>array('Student.industry_ready'=>1)));
        $this->set('students',$students);
    }

    public function forgot_password() {
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                $post_email = $this->request->data['Student']['email'];
                $student = $this->Student->find('first',array(
                    'conditions' => array('Student.email' => $post_email),
                    'recursive' => -1
                ));
                if(empty($student)){
                    $this->Session->setFlash('The email you entered was invalid','error_flash');
                    $this->redirect(array('controller'=>'students','action'=>'forgot_password'));
                }
                else{
                    $student = $this->_generate_password_token($student);
                    unset($student['Student']['password']);
                    if($this->Student->save($student) && $this->_send_forgot_password_email($student['Student']['id'])){
                        $this->Session->setFlash('Password reset instructions have been sent to your email address.
You have 24 hours to complete the request.','success_flash');
                        $this->redirect(array('controller'=>'students','action'=>'forgot_password'));
                    }
                }
            }
        }
    }

    public function reset_password_token($reset_password_token = null){
        if(empty($this->request->data)){
            $student = $this->Student->findByResetPasswordToken($reset_password_token);
            if(!empty($student['Student']['reset_password_token']) && !empty($student['Student']['token_created_at']) && $this->_valid_token($student['Student']['token_created_at'])){
                $this->set('token',$reset_password_token);
                $_SESSION['token'] = $reset_password_token;
            }
            else{
                $this->Session->setFlash('The password reset request has either expired or is invalid','error_flash');
                $this->redirect(array('controller'=>'students','action'=>'login'));
            }
        }
        else{
            if ($this->request->data['Student']['reset_password_token'] != $_SESSION['token']) {
                $this->Session->setflash('The password reset request has either expired or is invalid.','error_flash');
                $this->redirect(array('controller'=>'students','action'=>'login'));
            }

            $student = $this->Student->findByResetPasswordToken($this->request->data['Student']['reset_password_token']);
            $this->Student->id = $student['Student']['id'];
            $this->request->data['Student']['id'] = $student['Student']['id'];

            //debug($this->request->data);
            $this->Student->set($this->request->data);

            if ($this->Student->validates()) {
                if($this->request->data['Student']['password'] == $this->request->data['Student']['password_confirmation']){
                    $this->request->data['Student']['reset_password_token'] = $this->request->data['Student']['token_created_at'] = null;
                    if($this->Student->save($this->request->data) && $this->_send_password_update_success_email($student['Student']['id'])){
                        unset($_SESSION['token']);
                        $this->Session->setflash('Your password was changed successfully. Please login to continue.','success_flash');
                        $this->redirect(array('controller'=>'students','action'=>'login'));
                    }
                }
                else{
                    $this->Session->setflash('Two passwords does not match, please try again','error_flash');
                }
            }
        }
    }

    protected function _generate_password_token($user){
        if (empty($user)) {
            return null;
        }

        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33,79)) : $token .= chr(rand(80,126));
        }

        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;

        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }

        $user['Student']['reset_password_token'] = $hash;
        $user['Student']['token_created_at'] = date('Y-m-d H:i:s');

        return $user;
    }

    protected function _valid_token($token_created_at){
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }

    protected function _send_forgot_password_email($id = null){
        if (!empty($id)) {
            $this->Student->id = $id;
            $Student = $this->Student->read();
            $url = "Hi, Please use this URL to reset your password. ".'http://' . env('SERVER_NAME') .Router::url('/'). 'students/reset_password_token/' . $Student['Student']['reset_password_token'];

            EtheraEmail::mailer($Student['Student']['email'],'Password Reset Request - DO NOT REPLY',$url);

            return true;
        }
        return false;
    }

    protected function _send_password_update_success_email($id = null){
        if (!empty($id)) {
            $this->Student->id = $id;
            $Student = $this->Student->read();

            EtheraEmail::mailer($Student['Student']['email'],'Password Update - DO NOT REPLY','Hi, Password Successfully Updated. Please try to login.');

            return true;
        }
        return false;
    }

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->loginAction = array(
            'controller' => 'students',
            'action' => 'login'
        );
        $this->Auth->loginRedirect = array(
            'controller'=>'home',
            'action'=>'student'
        );
        $this->Auth->logoutRedirect = array(
            'controller'=>'homes',
            'action'=>'main'
        );
        $this->Auth->allow(array('forgot_password','reset_password_token','register','student_profile_router','view_public','show'));
    }
}