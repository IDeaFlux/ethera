<?php
App::uses('AppController', 'Controller');

class CourseUnitsController extends AppController {


	public function index() {
		$this->CourseUnit->recursive = 0;
		$this->set('courseUnits', $this->paginate());
	}


	public function view($id = null) {
		if (!$this->CourseUnit->exists($id)) {
			throw new NotFoundException(__('Invalid course unit'));
		}
		$options = array('conditions' => array('CourseUnit.' . $this->CourseUnit->primaryKey => $id));
		$this->set('courseUnit', $this->CourseUnit->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->CourseUnit->create();
			if ($this->CourseUnit->save($this->request->data)) {
				$this->Session->setFlash(__('The course unit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course unit could not be saved. Please, try again.'));
			}
		}
		$subjects = $this->CourseUnit->Subject->find('list');
		$studyPrograms = $this->CourseUnit->StudyProgram->find('list');
		$this->set(compact('subjects', 'studyPrograms'));
	}


	public function edit($id = null) {
		if (!$this->CourseUnit->exists($id)) {
			throw new NotFoundException(__('Invalid course unit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CourseUnit->save($this->request->data)) {
				$this->Session->setFlash(__('The course unit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course unit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CourseUnit.' . $this->CourseUnit->primaryKey => $id));
			$this->request->data = $this->CourseUnit->find('first', $options);
		}
		$subjects = $this->CourseUnit->Subject->find('list');
		$studyPrograms = $this->CourseUnit->StudyProgram->find('list');
		$this->set(compact('subjects', 'studyPrograms'));
	}


	public function delete($id = null) {
		$this->CourseUnit->id = $id;
		if (!$this->CourseUnit->exists()) {
			throw new NotFoundException(__('Invalid course unit'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CourseUnit->delete()) {
			$this->Session->setFlash(__('Course unit deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Course unit was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
