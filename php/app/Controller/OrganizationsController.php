<?php
App::uses('AppController', 'Controller');
/**
 * Organizations Controller
 *
 * @property Organization $Organization
 */
class OrganizationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Organization->recursive = 0;
		$this->set('organizations', $this->paginate());
	}


	public function view($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$this->set('organization', $this->Organization->find('first', $options));
	}


	public function add() {
        $this->loadModel('SystemUser');

		if ($this->request->is('post')) {
			$this->Organization->create();

			if ($this->Organization->saveAll($this->request->data)) {
                $this->Organization->saveField('organization_user_id',5);

                $this->Session->setFlash(__('The organization has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'),'error_flash');
			}
		}

        $system_users = $this->SystemUser->find('list', array('conditions'=>array('group_id'=>5)));
        $this->set('system_users',$system_users);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->loadModel('SystemUser');

		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Organization->saveAll($this->request->data)) {
                $this->Organization->saveField('organization_user_id',5);
				$this->Session->setFlash(__('The organization has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
			$this->request->data = $this->Organization->find('first', $options);
		}

        $system_users = $this->SystemUser->find('list', array('conditions'=>array('group_id'=>5)));
        $this->set('system_users',$system_users);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Organization->id = $id;
		if (!$this->Organization->exists()) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organization->delete()) {
			$this->Session->setFlash(__('Organization deleted'),'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organization was not deleted'),'error_flash');
		$this->redirect(array('action' => 'index'));
	}
}
