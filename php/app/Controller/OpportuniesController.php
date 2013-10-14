<?php
App::uses('AppController', 'Controller');
/**
 * Opportunies Controller
 *
 * @property Opportuny $Opportuny
 */
class OpportuniesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Opportuny->recursive = 0;
		$this->set('opportunies', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Opportuny->exists($id)) {
			throw new NotFoundException(__('Invalid opportuny'));
		}
		$options = array('conditions' => array('Opportuny.' . $this->Opportuny->primaryKey => $id));
		$this->set('opportuny', $this->Opportuny->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Opportuny->create();
			if ($this->Opportuny->save($this->request->data)) {
				$this->Session->setFlash(__('The opportuny has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opportuny could not be saved. Please, try again.'),'error_flash');
			}
		}
		$interestedAreas = $this->Opportuny->InterestedArea->find('list');
		$organizations = $this->Opportuny->Organization->find('list');
		$batches = $this->Opportuny->Batch->find('list');
		$this->set(compact('interestedAreas', 'organizations', 'batches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Opportuny->exists($id)) {
			throw new NotFoundException(__('Invalid opportuny'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Opportuny->save($this->request->data)) {
				$this->Session->setFlash(__('The opportuny has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opportuny could not be saved. Please, try again.'),'error_flash');
			}
		} else {
			$options = array('conditions' => array('Opportuny.' . $this->Opportuny->primaryKey => $id));
			$this->request->data = $this->Opportuny->find('first', $options);
		}
		$interestedAreas = $this->Opportuny->InterestedArea->find('list');
		$organizations = $this->Opportuny->Organization->find('list');
		$batches = $this->Opportuny->Batch->find('list');
		$this->set(compact('interestedAreas', 'organizations', 'batches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Opportuny->id = $id;
		if (!$this->Opportuny->exists()) {
			throw new NotFoundException(__('Invalid opportuny'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Opportuny->delete()) {
			$this->Session->setFlash(__('Opportuny deleted'),'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Opportuny was not deleted'),'error_flash');
		$this->redirect(array('action' => 'index'));
	}
}
