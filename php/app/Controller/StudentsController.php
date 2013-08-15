<?php
App::uses('AppController', 'Controller');

class StudentsController extends AppController {

    public $helpers = array('Js');


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

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('register');
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
            }
            if ($this->Enrollment->save($this->request->data)) {
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
        $courses = $students = $this->StudyProgramsCourseUnit->find('all', array(
            'conditions' => array(
                'study_program_id' => $study_program_id
            ),
            'recursive' => 0
        ));

        $this->set('courses',$courses);
        $this->set('student_id',$student_id);
        $this->layout = 'ajax';
    }
}
