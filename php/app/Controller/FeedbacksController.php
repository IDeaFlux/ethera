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

            //$save_year=$data['Feedback']['year'];
            //$save_month=$data['Feedback']['month'];
            //$save_day=$data['Feedback']['day'];
            //$save_hour=$data['Feedback']['hour'];
            //$save_min=$data['Feedback']['min'];
            //$date=$save_year."-".$save_month."-".$save_day."-".$save_hour."-".$save_min;

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

//        $this->loadModel('InterestedArea');
//        $inter=$this->InterestedArea->find('list',array('conditions'=>array(
//            'InterestedArea.system_user_id'=>$student,
//        )));
//        $this->set('interested_areas',$inter);



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

}
