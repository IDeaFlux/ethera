<?php
App::uses('AppController', 'Controller');

class HomesController extends AppController {
    public function admin() {

    }

    public function main() {
        $this->loadModel('Article');
        $articles = $this->Article->find('all',array('conditions'=>array('published_state'=>1),'limit'=>3,'order' => array('Article.id' => 'desc')));
        $this->set('articles',$articles);
    }

    public function student_processing() {
        $user = $this->Auth->user();

        $this->set('g_id',$user['group_id']);
    }

    public function student() {

        //Special Opportunities-------------------------------------------------------------
        $user = $this->Auth->user();
        $this->loadModel('SpecialOpportunity');
        $accepted = false;
        $no_sp_ops = false;

        $special_ops = $this->SpecialOpportunity->find(
            'all',
            array(
                'conditions'=>array(
                    'SpecialOpportunity.student_id'=>$user['id']
                ),
                'recursive'=>1
            )
        );

        if(!empty($special_ops)){
            foreach($special_ops as $special_op){
                if($special_op['SpecialOpportunity']['state']==1){
                    $accepted = true;
                    break;
                }
            }
        }
        else{
            $no_sp_ops = true;
        }

        $this->set('no_sp_ops',$no_sp_ops);
        $this->set('accepted',$accepted);
        $this->set('user',$user);
        //-------------------------------------------------------------------------------------

        //Interview Status Update
        $this->loadModel('Student');
        $have_interview = false;
        $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$user['id']),'recursive'=>2));

        $assignments = $student['Assignment'];

        if(!empty($assignments)){
            foreach($assignments as $assignment){
                if($assignment['state']==3){
                    $have_interview = true;
                    break;
                }
            }
        }

        $this->set('have_interview',$have_interview);
    }

    public function login() {

    }

    public function filters() {

    }

    public function ar(){

    }

    public function cgu(){

    }

    public function organization(){
        $user = $this->Auth->user();
        $this->set('id',$user['id']);
    }

    public function backend_router(){
        $user = $this->Auth->user();

        if(!empty($user)){
            if($user['group_id']==1){
                $this->redirect(array('action' => 'admin'));
            }
            if($user['group_id']==2){
                $this->redirect(array('action' => 'cgu'));
            }
            if($user['group_id']==4){
                $this->redirect(array('action' => 'student'));
            }
            if($user['group_id']==5){
                $this->redirect(array('action' => 'organization'));
            }
            if($user['group_id']==6){
                $this->redirect(array('action' => 'ar'));
            }
        }
        else{
            $this->redirect(array('action' => 'main'));
        }
    }

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow(array('main','login'));
    }
}