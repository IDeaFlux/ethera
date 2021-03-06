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

            $batches_study_programs = $this->request->data['BatchesStudyProgram']['study_program_id'];
            $count = 0;
            if(!empty($batches_study_programs)){
                foreach($batches_study_programs as $batches_study_program){
                    $data[$count]['study_program_id'] =  $batches_study_program;
                    $count++;
                }
                $this->request->data['BatchesStudyProgram'] = $data;
            }

			$this->Batch->create();
			if ($this->Batch->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The batch has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batch could not be saved. Please, try again.'),'error_flash');
			}
		}

        $this->loadModel('StudyProgram');
        $this->set('study_programs',$this->StudyProgram->find('list'));
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

    public function get_study_programs_for_opportunities() {
        $batch_id = $this->request->data['Opportunity']['batch_id'];
        $this->loadModel('StudyProgram');
        $study_programs_batches = $this->Batch->BatchesStudyProgram->find('all', array(
            'conditions' => array(
                'batch_id' => $batch_id,
                'industry_ready' => 1
            ),
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
