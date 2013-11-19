<?php
App::uses('AppController', 'Controller');
/**
 * Feedbacks Controller
 *
 * @property Feedback $Feedback
 */
class FeedbacksController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Feedback->recursive = 0;
		$this->set('feedbacks', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Feedback->exists($id)) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
		$this->set('feedback', $this->Feedback->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $student = $this->Auth->user('id');
		if ($this->request->is('post')) {
            debug($this->request->data);

            $data=$this->request->data;

			$this->Feedback->create();

            if($this->Feedback->save($this->request->data)){
                $this->Feedback->saveField('student_id',$student);
                $this->Feedback->saveField('date', date("Y-m-d H:i:s"));

				$this->Session->setFlash(__('The feedback has been saved'), 'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feedback could not be saved. Please, try again.'), 'error_flash');
			}
		}

		$organizations = $this->Feedback->Organization->find('list');
		$this->set(compact('student', 'organizations'));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Feedback->exists($id)) {
			throw new NotFoundException(__('Invalid feedback'));
		}
        $student=$this->Auth->user('id');
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Feedback->save($this->request->data)) {
                $this->Feedback->saveField('student_id',$student);
                $this->Feedback->saveField('date', date("Y-m-d H:i:s"));
				$this->Session->setFlash(__('The feedback has been saved'), 'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feedback could not be saved. Please, try again.'), 'error_flash');
			}
		} else {
			$options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
			$this->request->data = $this->Feedback->find('first', $options);
		}
		$organizations = $this->Feedback->Organization->find('list');
		$this->set(compact('students', 'organizations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Feedback->delete()) {
			$this->Session->setFlash(__('Feedback deleted'), 'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Feedback was not deleted'), 'error_flash');
		$this->redirect(array('action' => 'index'));
	}

    public function select_organization(){
        $this->loadModel('Organization');
        $this->set('organizations',$this->Organization->find('list'));

        if($this->request->is('post')){
            $org_id = $this->request->data['Organization']['id'];

            $this->Organization->id = $org_id;
            if (!$this->Organization->exists()) {
                throw new NotFoundException(__('Invalid Organization'));
            }

            $this->redirect(array('action' => 'add_or_view_feedback',$org_id));
        }
    }

    public function add_or_view_feedback($id=null){

        $this->loadModel('Organization');
        $user = $this->Auth->user();
        $organization = $this->Organization->findById($id);
        $feedbacks = $this->Feedback->find('all',array('conditions'=>array('Feedback.organization_id'=>$id),'recursive'=>2));

        $this->set('feedbacks',$feedbacks);
        $this->set('id',$user['id']);
        $this->set('organization',$organization);

        if($this->request->is('post')){
            if ($this->Feedback->save($this->request->data)) {
                $this->Feedback->saveField('student_id',$user['id']);
                $this->Feedback->saveField('date', date("Y-m-d H:i:s"));
                $this->Session->setFlash(__('The feedback has been saved'), 'success_flash');
                $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
            } else {
                $this->Session->setFlash(__('The feedback could not be saved. Please, try again.'), 'error_flash');
            }
        }
    }
}
