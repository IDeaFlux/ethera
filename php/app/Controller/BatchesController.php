<?php
App::uses('AppController', 'Controller');

class BatchesController extends AppController {


    public function index() {
		$this->Batch->recursive = 0;
		$this->set('batches', $this->paginate());
	}


	public function view($id = null) {
		if (!$this->Batch->exists($id)) {
			throw new NotFoundException(__('Invalid batch'),'error_flash');
		}
		$options = array('conditions' => array('Batch.' . $this->Batch->primaryKey => $id));
		$this->set('batch', $this->Batch->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Batch->create();
			if ($this->Batch->save($this->request->data)) {
				$this->Session->setFlash(__('The batch has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batch could not be saved. Please, try again.'),'error_flash');
			}
		}
	}


	public function edit($id = null) {
		if (!$this->Batch->exists($id)) {
			throw new NotFoundException(__('Invalid batch'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Batch->save($this->request->data)) {
				$this->Session->setFlash(__('The batch has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batch could not be saved. Please, try again.'),'error_flash');
			}
		} else {
			$options = array('conditions' => array('Batch.' . $this->Batch->primaryKey => $id));
			$this->request->data = $this->Batch->find('first', $options);
		}
	}

    public function get_study_programs() {
        $batch_id = $this->request->data['Batch']['batch_id'];
        $this->loadModel('StudyProgram');
        $study_programs_batches = $this->Batch->BatchesStudyProgram->find('all', array(
            'conditions' => array('batch_id' => $batch_id),
            'recursive' => -1
        ));
        if(!empty($study_programs_batches)){
            foreach($study_programs_batches as $study_programs_batch){
                $study_program_id = $study_programs_batch['BatchesStudyProgram']['study_program_id'];
                $study_program_full = $this->StudyProgram->find('first',array(
                    'conditions' => array('id' => $study_program_id),
                    'recursive' => -1
                ));
                $study_programs[$study_program_id] = $study_program_full['StudyProgram']['program_code'];
            };
            $this->set('study_programs',$study_programs);
        }
        else{
            $this->set('study_programs',array());
        }
        $this->layout = 'ajax';
    }
}
