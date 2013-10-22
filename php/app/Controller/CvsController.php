<?php
App::uses('AppController', 'Controller');
/**
 * Cvs Controller
 *
 * @property Cv $Cv
 */
class CvsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cv->recursive = 0;
		$this->set('cvs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cv->exists($id)) {
			throw new NotFoundException(__('Invalid cv'));
		}
		$options = array('conditions' => array('Cv.' . $this->Cv->primaryKey => $id));
		$this->set('cv', $this->Cv->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cv->create();
			if ($this->Cv->save($this->request->data)) {
                $this->Cv->saveField('upload_time',date(DATE_ATOM));
                //xdebug(date(DATE_ATOM));
				$this->Session->setFlash(__('The cv has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cv could not be saved. Please, try again.'),'error_flash');
			}
		}
		$students = $this->Cv->Student->find('list');
		$this->set(compact('students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cv->exists($id)) {
			throw new NotFoundException(__('Invalid cv'),'error_flash');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cv->save($this->request->data)) {
				$this->Session->setFlash(__('The cv has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cv could not be saved. Please, try again.'),'info_flash');
			}
		} else {
			$options = array('conditions' => array('Cv.' . $this->Cv->primaryKey => $id));
			$this->request->data = $this->Cv->find('first', $options);
		}
		$students = $this->Cv->Student->find('list');
		$this->set(compact('students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cv->id = $id;
		if (!$this->Cv->exists()) {
			throw new NotFoundException(__('Invalid cv'),'error_flash');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cv->delete()) {
			$this->Session->setFlash(__('Cv deleted'),'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cv was not deleted'),'info_flash');
		$this->redirect(array('action' => 'index'));
	}
}
