<?php
App::uses('AppController', 'Controller');
App::uses('EtheraEmail','Lib');
App::uses('GPA','Lib');
App::uses('StudentManipulation','Lib');

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
            if ($this->Student->sendData($this->request->data)) {
                $this->Session->setFlash(__('You have been registered successfully'),'success_flash');
                $this->redirect(array('controller'=>'homes','action' => 'main'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'));
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
                'approved_state' => 2 // Not approved from initial approval
                ),
            'limit' => 20
        );
        $initial_ready_students = $this->Paginator->paginate('Student');
        $this->set('students',$initial_ready_students);
    }

    public function init_approval_approve($id=null){
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->onlyAllow('post');
        $data['Student']['id'] = $id;
        $data['Student']['approved_state'] = 3;
        if ($this->Student->save($data)) {
            $this->Session->setFlash(__('The student has been approved'),'success_flash');
            $this->redirect(array('action' => 'init_approval'));
        } else {
            $this->Session->setFlash(__('The student could not be saved. Please, try again.'),'error_flash');
            $this->redirect(array('action' => 'init_approval'));
        }
    }

    public function final_approval(){
        $this->Paginator->settings = array(
            'conditions' => array(
                'approved_state' => 4 // Not approved from initial approval
            ),
            'limit' => 20
        );
        $final_ready_students = $this->Paginator->paginate('Student');
        $this->set('students',$final_ready_students);
    }

    public function final_approval_approve($id=null){
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->onlyAllow('post');
        $data['Student']['id'] = $id;
        $data['Student']['approved_state'] = 5;
        if ($this->Student->save($data)) {
            $this->Session->setFlash(__('The student has been approved'),'success_flash');
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
                $this->Session->setFlash(__('The student data has been updated'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
            $this->request->data = $this->Student->find('first', $options);
        }

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
                $data[$count-1]['Assignment']['interested_area_id'] = $assignment['interested_area_id'];
                $data[$count-1]['Assignment']['student_id'] = $id;
                $data[$count-1]['Assignment']['priority'] = $count;
                if(!empty($current_submissions_pre[$count-1]['Assignment']['priority']) && $current_submissions_pre[$count-1]['Assignment']['priority'] == $count){
                    $data[$count-1]['Assignment']['id'] = $current_submissions_pre[$count-1]['Assignment']['id'];
                }
                $count++;
            }
            if($this->Assignment->saveAll($data)) {
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

        $count = 0;
        foreach($current_submissions_pre as $current_submission_pre){
            $current_submissions[$count]['name'] = $current_submission_pre['InterestedArea']['name'];
            $current_submissions[$count]['priority'] = $current_submission_pre['Assignment']['priority'];
            $interested_area = $current_submission_pre['InterestedArea']['id'];
            if(isset($interested_area)){
                $company_list[$count] = $this->Opportunity->find(
                    'all',
                    array(
                        'conditions' => array(
                            'interested_area_id' => $current_submission_pre['InterestedArea']['id']
                        )
                    )
                );

            }
            $count++;
        }

        debug($company_list);
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
                                $enrollment['Enrollment']['course_unit'] = $unit;
                                $filtering_enrollments[$course_count-1]= $enrollment;


                            }
                        }
                    }

                    if($course_count == sizeof($course_units)){
                        $filtered_students[$student_count]['Student']['filter_gpa'] = GPA::calculate($filtering_enrollments);
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
            $students = StudentManipulation::gpa_sort($final_students);

            $this->set('students',$students);
            $this->set('return_data',$this->request->data);
        }
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
        $this->Auth->allow('register');
    }
}