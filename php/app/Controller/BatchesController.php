<?php
App::uses('AppController', 'Controller');

class BatchesController extends AppController {


    public function index() {
		$this->Batch->recursive = 0;
		$this->set('batches', $this->paginate());
	}


	public function view($id = null) {
		if (!$this->Batch->exists($id)) {
			throw new NotFoundException(__('Invalid batch'));
		}
		$options = array('conditions' => array('Batch.' . $this->Batch->primaryKey => $id));
		$this->set('batch', $this->Batch->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Batch->create();
			if ($this->Batch->save($this->request->data)) {
				$this->Session->setFlash(__('The batch has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batch could not be saved. Please, try again.'));
			}
		}
	}


	public function edit($id = null) {
		if (!$this->Batch->exists($id)) {
			throw new NotFoundException(__('Invalid batch'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Batch->save($this->request->data)) {
				$this->Session->setFlash(__('The batch has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batch could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Batch.' . $this->Batch->primaryKey => $id));
			$this->request->data = $this->Batch->find('first', $options);
		}
	}
}
