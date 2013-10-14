<?php
App::uses('AppController', 'Controller');

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
        $reg_number = $this->request->data['Student']['reg_number'];
        $student = $this->Student->find('first', array(
            'conditions' => array(
                'Student.id' => $reg_number
            ),
        ));
        $this->set('student',$student);
        $this->layout = 'ajax';
    }

    public function get_courses(){
        //debug($this->request->data);
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
        debug($data);
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
                //$this->redirect($this->Auth->redirect());
                $this->redirect(array('controller'=>'homes','action'=>'admin'));
            }
            else{
                $this->Session->setFlash('Your email & password combination is incorrect','error_flash');
            }
        }
    }

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->loginAction = array(
            'controller' => 'students',
            'action' => 'login'
        );
        $this->Auth->allow('register');
    }
}
