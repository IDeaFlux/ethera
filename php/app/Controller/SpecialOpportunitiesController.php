<?php
App::uses('AppController', 'Controller');

class SpecialOpportunitiesController extends AppController {
    public $components = array(
        'Paginator'
    );

    public function grant($assignment_id=null,$student_id=null){
        $user = $this->Auth->user();
        if(empty($assignment_id) || empty($student_id)){
            $this->redirect(array('controller'=>'homes','action'=>'backend_router'));
        }
        elseif($user['group_id']!=5){
            $this->Session->setflash('You are not an Organization','error_flash');
            $this->redirect(array('controller'=>'students','action'=>'student_profile_router',$student_id));
        }

        $this->request->onlyAllow('post');

        $this->loadModel('Organization');
        $organization = $this->Organization->find('first',array('conditions'=>array('Organization.organization_user_id'=>$user['id'])));

        $this->loadModel('Assignment');
        $assignment = $this->Assignment->findById($assignment_id);

        if(empty($assignment['Assignment']['organization_id']) && !empty($assignment['Assignment']['interested_area_id'])){

            $special_opportunity['SpecialOpportunity']['student_id'] = $student_id;
            $special_opportunity['SpecialOpportunity']['assignment_id'] = $assignment_id;
            $special_opportunity['SpecialOpportunity']['organization_id'] = $organization['Organization']['id'];

            if($this->SpecialOpportunity->save($special_opportunity)){
                $this->Session->setflash('Special Grant Saved','success_flash');
                $this->redirect(array('controller'=>'students','action'=>'student_profile_router',$student_id));
            }
            else{
                $this->Session->setflash('Special Grant NOT Saved!','error_flash');
                $this->redirect(array('controller'=>'students','action'=>'student_profile_router',$student_id));
            }
        }

        if($organization['Organization']['id'] != $assignment['Assignment']['organization_id']){
            $this->Session->setflash('Invalid Submission You cannot Grant opportunities for other Organizations','error_flash');
            $this->redirect(array('controller'=>'students','action'=>'student_profile_router',$student_id));
        }

        $special_opportunity['SpecialOpportunity']['student_id'] = $student_id;
        $special_opportunity['SpecialOpportunity']['assignment_id'] = $assignment_id;
        $special_opportunity['SpecialOpportunity']['organization_id'] = $organization['Organization']['id'];

        if($this->SpecialOpportunity->save($special_opportunity)){
            $this->Session->setflash('Special Grant Saved','success_flash');
            $this->redirect(array('controller'=>'students','action'=>'student_profile_router',$student_id));
        }
        else{
            $this->Session->setflash('Special Grant NOT Saved!','error_flash');
            $this->redirect(array('controller'=>'students','action'=>'student_profile_router',$student_id));
        }
    }

    public function index($id=null){
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
        $organization = $this->Organization->find('first',array('conditions'=>array('Organization.organization_user_id'=>$user['id'])));

        $this->Paginator->settings = array(
            'conditions' => array(
                'SpecialOpportunity.organization_id' => $organization['Organization']['id']
            ),
            'limit' => 20,
            'recursive' => 2
        );

        $special_opportunities = $this->Paginator->paginate('SpecialOpportunity');
        $this->set('special_opportunities', $special_opportunities);
    }

    public function consider($id=null){
        $this->loadModel('Student');
        $user = $this->Auth->user();

        if(!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid User'));
        }
        elseif($user['id']!=$id){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }
        elseif($user['group_id']!=4){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }

        $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$id),'recursive'=>2));

        $this->Paginator->settings = array(
            'conditions' => array(
                'SpecialOpportunity.student_id' => $student['Student']['id']
            ),
            'limit' => 20,
            'recursive' => 2
        );
        $special_opportunities = $this->Paginator->paginate('SpecialOpportunity');

        if(!empty($special_opportunities)){
            foreach($special_opportunities as $special_opportunity){
                if($special_opportunity['SpecialOpportunity']['state']==1){
                    $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
                }
            }
        }
        elseif(empty($special_opportunities)){
            $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
        }

        $this->set('special_opportunities', $special_opportunities);
        $this->set('student',$student);
    }

    public function accept($assignment_id=null,$special_opportunity_id=null,$student_id=null){
        $user = $this->Auth->user();

        if($user['group_id']!=4){
            $this->redirect(array('controller'=>'special_opportunities','action' => 'consider',$user['id']));
        }

        $this->request->onlyAllow('post', 'delete');

        if(!empty($assignment_id) && !empty($special_opportunity_id) && !empty($student_id)){
            $this->loadModel('Assignment');
            $this->loadModel('Student');

            $assignment_found = $this->Assignment->findById($assignment_id);

            if($assignment_found['Assignment']['organization_id']==0){
                $special_opportunity_found = $this->SpecialOpportunity->findById($special_opportunity_id);
                $assignment['Assignment']['organization_id'] = $special_opportunity_found['SpecialOpportunity']['organization_id'];
            }

            $student['Student']['id'] = $student_id;
            $student['Student']['processing_state'] = 1;

            $assignment['Assignment']['id'] = $assignment_id;
            $assignment['Assignment']['state'] = 3;

            $special_opportunity['SpecialOpportunity']['id'] = $special_opportunity_id;
            $special_opportunity['SpecialOpportunity']['state'] = 1;


            if($this->Student->save($student) && $this->Assignment->save($assignment) && $this->SpecialOpportunity->save($special_opportunity)){
                $this->Session->setflash('Special Grant Accepted','success_flash');
                $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
            }
            else{
                $this->Session->setflash('Cannot Accept Special Grant!','error_flash');
                $this->redirect(array('controller'=>'homes','action' => 'backend_router'));
            }
        }
    }

    public function delete($id = null) {

        $user = $this->Auth->user();
        if($user['group_id']!=5){
            $this->redirect(array('controller'=>'special_opportunities','action' => 'index',$user['id']));
        }

        $this->SpecialOpportunity->id = $id;
        if (!$this->SpecialOpportunity->exists()) {
            throw new NotFoundException(__('Invalid Entry'),'error_flash');
        }

        $options = array('conditions' => array('SpecialOpportunity.' . $this->SpecialOpportunity->primaryKey => $id));
        $special_opportunity = $this->SpecialOpportunity->find('first', $options);

        if($special_opportunity['SpecialOpportunity']['state']==1){
            $this->Session->setFlash(__('Since this student accepted your offer, You cannot delete this grant'),'error_flash');
            $this->redirect(array('controller'=>'special_opportunities','action' => 'index',$user['id']));
        }

        $this->request->onlyAllow('post', 'delete');
        if ($this->SpecialOpportunity->delete()) {
            $this->Session->setFlash(__('Deleted'),'success_flash');
            $this->redirect(array('controller'=>'special_opportunities','action' => 'index',$user['id']));
        }
        $this->Session->setFlash(__('Not deleted'),'info_flash');
        $this->redirect(array('controller'=>'special_opportunities','action' => 'index',$user['id']));
    }
}
