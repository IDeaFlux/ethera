<?php
App::uses('AppController', 'Controller');
/**
 * InterestedAreas Controller
 *
 * @property InterestedArea $InterestedArea
 */
class InterestedAreasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->InterestedArea->recursive = 0;
		$this->set('interestedAreas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InterestedArea->exists($id)) {
			throw new NotFoundException(__('Invalid interested area'));
		}
		$options = array('conditions' => array('InterestedArea.' . $this->InterestedArea->primaryKey => $id));
		$this->set('interestedArea', $this->InterestedArea->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InterestedArea->create();
			if ($this->InterestedArea->save($this->request->data)) {
				$this->Session->setFlash(__('The interested area has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interested area could not be saved. Please, try again.'));
			}
		}
		$studyPrograms = $this->InterestedArea->StudyProgram->find('list');
		$this->set(compact('studyPrograms'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->InterestedArea->exists($id)) {
			throw new NotFoundException(__('Invalid interested area'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->InterestedArea->save($this->request->data)) {
				$this->Session->setFlash(__('The interested area has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interested area could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InterestedArea.' . $this->InterestedArea->primaryKey => $id));
			$this->request->data = $this->InterestedArea->find('first', $options);
		}
		$studyPrograms = $this->InterestedArea->StudyProgram->find('list');
		$this->set(compact('studyPrograms'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->InterestedArea->id = $id;
		if (!$this->InterestedArea->exists()) {
			throw new NotFoundException(__('Invalid interested area'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InterestedArea->delete()) {
			$this->Session->setFlash(__('Interested area deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Interested area was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
