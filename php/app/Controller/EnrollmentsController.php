<?php
App::uses('AppController', 'Controller');
/**
 * Enrollments Controller
 *
 * @property Enrollment $Enrollment
 */
class EnrollmentsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Enrollment->recursive = 0;
		$this->set('enrollments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
		$this->set('enrollment', $this->Enrollment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enrollment->create();
			if ($this->Enrollment->save($this->request->data)) {
				$this->Session->setFlash(__('The enrollment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enrollment could not be saved. Please, try again.'));
			}
		}
		$courseUnits = $this->Enrollment->CourseUnit->find('list');
		$students = $this->Enrollment->Student->find('list');
		$this->set(compact('courseUnits', 'students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Enrollment->save($this->request->data)) {
				$this->Session->setFlash(__('The enrollment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enrollment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
			$this->request->data = $this->Enrollment->find('first', $options);
		}
		$courseUnits = $this->Enrollment->CourseUnit->find('list');
		$students = $this->Enrollment->Student->find('list');
		$this->set(compact('courseUnits', 'students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Enrollment->id = $id;
		if (!$this->Enrollment->exists()) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Enrollment->delete()) {
			$this->Session->setFlash(__('Enrollment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Enrollment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
