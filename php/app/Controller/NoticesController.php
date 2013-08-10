<?php
App::uses('AppController', 'Controller');
/**
 * Notices Controller
 *
 * @property Notice $Notice
 */
class NoticesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Notice->recursive = 0;
		$this->set('notices', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'));
		}
		$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
		$this->set('notice', $this->Notice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Notice->create();
			if ($this->Notice->save($this->request->data)) {
				$this->Session->setFlash(__('The notice has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notice could not be saved. Please, try again.'));
			}
		}
		$systemUsers = $this->Notice->SystemUser->find('list');
		$this->set(compact('systemUsers'));

        $articles=$this->Notice->Article->find('list');
        $this->set('articles',$articles);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Notice->save($this->request->data)) {
				$this->Session->setFlash(__('The notice has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
			$this->request->data = $this->Notice->find('first', $options);
		}
		$systemUsers = $this->Notice->SystemUser->find('list');
		$this->set(compact('systemUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Notice->id = $id;
		if (!$this->Notice->exists()) {
			throw new NotFoundException(__('Invalid notice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Notice->delete()) {
			$this->Session->setFlash(__('Notice deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Notice was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
