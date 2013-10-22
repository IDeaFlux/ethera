<?php
App::uses('AppController', 'Controller');
/**
 * ExtraActivities Controller
 *
 * @property ExtraActivity $ExtraActivity
 */
class ExtraActivitiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ExtraActivity->recursive = 0;
		$this->set('extraActivities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ExtraActivity->exists($id)) {
			throw new NotFoundException(__('Invalid extra activity'),'error_flash');
		}
		$options = array('conditions' => array('ExtraActivity.' . $this->ExtraActivity->primaryKey => $id));
		$this->set('extraActivity', $this->ExtraActivity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExtraActivity->create();
			if ($this->ExtraActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The extra activity has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extra activity could not be saved. Please, try again.'),'error_flash');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ExtraActivity->exists($id)) {
			throw new NotFoundException(__('Invalid extra activity'),'error_flash');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ExtraActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The extra activity has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extra activity could not be saved. Please, try again.'),'error_flash');
			}
		} else {
			$options = array('conditions' => array('ExtraActivity.' . $this->ExtraActivity->primaryKey => $id));
			$this->request->data = $this->ExtraActivity->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ExtraActivity->id = $id;
		if (!$this->ExtraActivity->exists()) {
			throw new NotFoundException(__('Invalid extra activity'),'error_flash');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ExtraActivity->delete()) {
			$this->Session->setFlash(__('Extra activity deleted'),'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Extra activity was not deleted'),'info_flash');
		$this->redirect(array('action' => 'index'));
	}
}
