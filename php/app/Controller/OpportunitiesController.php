<?php
App::uses('AppController', 'Controller');

class OpportunitiesController extends AppController {

	public function index() {
		$this->Opportunity->recursive = 0;
		$this->set('opportunities', $this->paginate());
	}

	public function view($id = null) {
		if (!$this->Opportunity->exists($id)) {
			throw new NotFoundException(__('Invalid Opportunity'));
		}
		$options = array('conditions' => array('Opportunity.' . $this->Opportunity->primaryKey => $id));
		$this->set('opportunity', $this->Opportunity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');

        $industry_ready=$this->BatchesStudyProgram->find(
            'first',
            array(
                'conditions' => array(
                'BatchesStudyProgram.industry_ready' => 1
            ),
            ));

        $batch=$industry_ready['Batch']['academic_year'];
        $this->set('batch',$batch);

        $batchId=$industry_ready['BatchesStudyProgram']['batch_id'];

        //$batch_id=$batch['Batch']['id'];

        debug($industry_ready);
		if ($this->request->is('post')) {
			$this->Opportunity->create();
			if ($this->Opportunity->save($this->request->data)) {
                $this->Opportunity->saveField('batch_id',$batchId);
				$this->Session->setFlash(__('The opportunity has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opportunity could not be saved. Please, try again.'),'error_flash');
			}
		}
		$interestedAreas = $this->Opportunity->InterestedArea->find('list');
		$organizations = $this->Opportunity->Organization->find('list');
		//$batches = $this->Opportunity->Batch->find('list');
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
        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');

        $industry_ready=$this->BatchesStudyProgram->find(
            'first',
            array(
                'conditions' => array(
                    'BatchesStudyProgram.industry_ready' => 1
                ),
            ));

        $batch=$industry_ready['Batch']['academic_year'];
        $this->set('batch',$batch);

        $batchId=$industry_ready['BatchesStudyProgram']['batch_id'];

		if (!$this->Opportunity->exists($id)) {
			throw new NotFoundException(__('Invalid opportunity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Opportunity->save($this->request->data)) {
                $this->Opportunity->saveField('batch_id',$batchId);
				$this->Session->setFlash(__('The opportunity has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opportunity could not be saved. Please, try again.'),'error_flash');
			}
		} else {
			$options = array('conditions' => array('Opportunity.' . $this->Opportunity->primaryKey => $id));
			$this->request->data = $this->Opportunity->find('first', $options);
		}
		$interestedAreas = $this->Opportunity->InterestedArea->find('list');
		$organizations = $this->Opportunity->Organization->find('list');
		//$batches = $this->Opportunity->Batch->find('list');
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
		$this->Opportunity->id = $id;
		if (!$this->Opportunity->exists()) {
			throw new NotFoundException(__('Invalid opportunity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Opportunity->delete()) {
			$this->Session->setFlash(__('Opportunity deleted'),'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Opportunity was not deleted'),'error_flash');
		$this->redirect(array('action' => 'index'));
	}
}
