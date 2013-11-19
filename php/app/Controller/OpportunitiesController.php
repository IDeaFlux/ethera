<?php
App::uses('AppController', 'Controller');

class OpportunitiesController extends AppController {

    public $components = array(
        'Paginator'
    );

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
            'all',
            array(
                'conditions' => array(
                'BatchesStudyProgram.industry_ready' => 1
            ),
                'fields' => 'DISTINCT BatchesStudyProgram.batch_id'
            ));

        if(!empty($industry_ready)){
            foreach($industry_ready as $batch){
                $data = $this->Batch->findById($batch['BatchesStudyProgram']['batch_id']);
                $batch_data[$batch['BatchesStudyProgram']['batch_id']] = $data['Batch']['academic_year'];
            }
        }

        $this->set('batch',$batch_data);

		if ($this->request->is('post')) {
			$this->Opportunity->create();
			if ($this->Opportunity->save($this->request->data)) {
				$this->Session->setFlash(__('The opportunity has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opportunity could not be saved. Please, try again.'),'error_flash');
			}
		}
		$interestedAreas = $this->Opportunity->InterestedArea->find('list');
		$organizations = $this->Opportunity->Organization->find('list');
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

    public function index_opp_org($id=null){
        $this->loadModel('SystemUser');
        $user = $this->Auth->user();

        if(!$this->SystemUser->exists($id)) {
            throw new NotFoundException(__('Invalid User'));
        }
        elseif($user['id']!=$id){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }
        elseif($user['group_id']!=5){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }
        $this->loadModel('Organization');

        $organization = $this->Organization->find('first',array('conditions'=>array('Organization.organization_user_id'=>$id)));

        $this->Paginator->settings = array(
            'conditions' => array(
                'Opportunity.organization_id' => $organization['Organization']['id']
            ),
            'limit' => 20
        );

        $opportunities = $this->Paginator->paginate('Opportunity');

        $this->set('opportunities', $opportunities);
        $this->set('id',$id);
    }

    public function edit_opp_org($org_id=null,$id=null){
        $this->Opportunity->id = $id;
        if (!$this->Opportunity->exists()) {
            throw new NotFoundException(__('Invalid opportunity'));
        }
        $this->loadModel('SystemUser');
        $user = $this->Auth->user();

        if(!$this->SystemUser->exists($org_id)) {
            throw new NotFoundException(__('Invalid User'));
        }
        elseif($user['id']!=$org_id){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }
        elseif($user['group_id']!=5){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }

        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');

        $industry_ready=$this->BatchesStudyProgram->find(
            'all',
            array(
                'conditions' => array(
                    'BatchesStudyProgram.industry_ready' => 1
                ),
                'fields' => 'DISTINCT BatchesStudyProgram.batch_id'
            ));

        if(!empty($industry_ready)){
            foreach($industry_ready as $batch){
                $data = $this->Batch->findById($batch['BatchesStudyProgram']['batch_id']);
                $batch_data[$batch['BatchesStudyProgram']['batch_id']] = $data['Batch']['academic_year'];
            }
        }

        $this->set('id',$org_id);
        $this->set('batch',$batch_data);

        if ($this->request->is('post') || $this->request->is('put')) {

            $this->loadModel('Organization');
            $organization = $this->Organization->find('first',array('conditions'=>array('Organization.organization_user_id'=>$org_id)));
            $this->request->data['Opportunity']['organization_id'] = $organization['Organization']['id'];
            //debug($this->request->data);
            $this->Opportunity->create();
            if ($this->Opportunity->save($this->request->data)) {
                $this->Session->setFlash(__('The opportunity has been saved'),'success_flash');
                $this->redirect(array('action' => 'index_opp_org',$user['id']));
            } else {
                $this->Session->setFlash(__('The opportunity could not be saved. Please, try again.'),'error_flash');
            }
        }
        else{
            $options = array('conditions' => array('Opportunity.' . $this->Opportunity->primaryKey => $id));
            $this->request->data = $this->Opportunity->find('first', $options);
        }
        $interestedAreas = $this->Opportunity->InterestedArea->find('list');
        $organizations = $this->Opportunity->Organization->find('list');
        $this->set(compact('interestedAreas', 'organizations', 'batches'));
    }

    public function add_opp_org($id=null){
        $this->loadModel('SystemUser');
        $user = $this->Auth->user();

        if(!$this->SystemUser->exists($id)) {
            throw new NotFoundException(__('Invalid User'));
        }
        elseif($user['id']!=$id){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }
        elseif($user['group_id']!=5){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }

        $this->loadModel('BatchesStudyProgram');
        $this->loadModel('Batch');

        $industry_ready=$this->BatchesStudyProgram->find(
            'all',
            array(
                'conditions' => array(
                    'BatchesStudyProgram.industry_ready' => 1
                ),
                'fields' => 'DISTINCT BatchesStudyProgram.batch_id'
            ));

        if(!empty($industry_ready)){
            foreach($industry_ready as $batch){
                $data = $this->Batch->findById($batch['BatchesStudyProgram']['batch_id']);
                $batch_data[$batch['BatchesStudyProgram']['batch_id']] = $data['Batch']['academic_year'];
            }
        }
        $this->set('id',$id);
        $this->set('batch',$batch_data);

        if ($this->request->is('post')) {
            $this->loadModel('Organization');
            $organization = $this->Organization->find('first',array('conditions'=>array('Organization.organization_user_id'=>$id)));
            $this->request->data['Opportunity']['organization_id'] = $organization['Organization']['id'];
            $this->Opportunity->create();
            if(($this->request->data['Opportunity']['slots']>0) && ($this->Opportunity->save($this->request->data))) {
                $this->Session->setFlash(__('The opportunity has been saved'),'success_flash');
                $this->redirect(array('action' => 'add_opp_org',$id));
            } else {
                $this->Session->setFlash(__('The opportunity could not be saved. Please, try again.'),'error_flash');
            }
        }
        $interestedAreas = $this->Opportunity->InterestedArea->find('list');
        $organizations = $this->Opportunity->Organization->find('list');
        $this->set(compact('interestedAreas', 'organizations', 'batches'));
    }
}
