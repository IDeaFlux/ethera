<?php
App::uses('AppController', 'Controller');

class ArticlesController extends AppController {

    public $helpers= array(
        'TinyMCE.TinyMCE'
    );

	public function index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
	}

    public function blog() {
        $this->Article->recursive = 0;
        $this->set('articles', $this->paginate());
    }

	public function view($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'),'error_flash');
		}
		$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
		$this->set('article', $this->Article->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'),'error_flash');
			}
		}
		$systemUsers = $this->Article->SystemUser->find('list');
		$this->set(compact('systemUsers'));
	}


	public function edit($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'),'error_flash');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'),'error_flash');
			}
		} else {
			$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
			$this->request->data = $this->Article->find('first', $options);
		}
		$systemUsers = $this->Article->SystemUser->find('list');
		$this->set(compact('systemUsers'));
	}


	public function delete($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'),'error_flash');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Article->delete()) {
			$this->Session->setFlash(__('Article deleted'),'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Article was not deleted'),'info_flash');
		$this->redirect(array('action' => 'index'));
	}

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('blog');
    }
}
