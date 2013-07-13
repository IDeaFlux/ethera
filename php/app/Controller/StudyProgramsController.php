<?php
App::uses('AppController', 'Controller');
/**
 * StudyPrograms Controller
 *
 * @property StudyProgram $StudyProgram
 */
class StudyProgramsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StudyProgram->recursive = 0;
		$this->set('studyPrograms', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StudyProgram->exists($id)) {
			throw new NotFoundException(__('Invalid study program'));
		}
		$options = array('conditions' => array('StudyProgram.' . $this->StudyProgram->primaryKey => $id));
		$this->set('studyProgram', $this->StudyProgram->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StudyProgram->create();
			if ($this->StudyProgram->save($this->request->data)) {
				$this->Session->setFlash(__('The study program has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The study program could not be saved. Please, try again.'));
			}
		}
		$courseUnits = $this->StudyProgram->CourseUnit->find('list');
		$interestedAreas = $this->StudyProgram->InterestedArea->find('list');
		$this->set(compact('courseUnits', 'interestedAreas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StudyProgram->exists($id)) {
			throw new NotFoundException(__('Invalid study program'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StudyProgram->save($this->request->data)) {
				$this->Session->setFlash(__('The study program has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The study program could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StudyProgram.' . $this->StudyProgram->primaryKey => $id));
			$this->request->data = $this->StudyProgram->find('first', $options);
		}
		$courseUnits = $this->StudyProgram->CourseUnit->find('list');
		$interestedAreas = $this->StudyProgram->InterestedArea->find('list');
		$this->set(compact('courseUnits', 'interestedAreas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StudyProgram->id = $id;
		if (!$this->StudyProgram->exists()) {
			throw new NotFoundException(__('Invalid study program'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StudyProgram->delete()) {
			$this->Session->setFlash(__('Study program deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Study program was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
