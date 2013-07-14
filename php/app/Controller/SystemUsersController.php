<?php
App::uses('AppController', 'Controller');

class SystemUsersController extends AppController {


	public function index() {
		$this->SystemUser->recursive = 0;
		$this->set('systemUsers', $this->paginate());
	}


	public function view($id = null) {
		if (!$this->SystemUser->exists($id)) {
			throw new NotFoundException(__('Invalid system user'));
		}
		$options = array('conditions' => array('SystemUser.' . $this->SystemUser->primaryKey => $id));
		$this->set('systemUser', $this->SystemUser->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {

            if ($this->SystemUser->sendData($this->request->data)) {
                $this->Session->setFlash(__('The system user has been saved'));
                //echo debug($this->request->data,true,true);
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The system user could not be saved. Please, try again.'));
            }
		}
		$groups = $this->SystemUser->Group->find('list');
		$this->set(compact('groups'));
	}


	public function edit($id = null) {
		if (!$this->SystemUser->exists($id)) {
			throw new NotFoundException(__('Invalid system user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SystemUser->save($this->request->data)) {
				$this->Session->setFlash(__('The system user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SystemUser.' . $this->SystemUser->primaryKey => $id));
			$this->request->data = $this->SystemUser->find('first', $options);
		}
		$groups = $this->SystemUser->Group->find('list');
		$this->set(compact('groups'));
	}


	public function delete($id = null) {
		$this->SystemUser->id = $id;
		if (!$this->SystemUser->exists()) {
			throw new NotFoundException(__('Invalid system user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SystemUser->delete()) {
			$this->Session->setFlash(__('System user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('System user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

    public function login() {
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->redirect($this->Auth->redirect());
            }
            else{
                $this->Session->setFlash('Your username password combination is incorrect');
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function beforeFilter() {
        parent::beforeFilter();
    }
}
