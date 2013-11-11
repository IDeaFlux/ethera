<?php
App::uses('AppController', 'Controller');

class CvsController extends AppController {


	public function index() {
		$this->Cv->recursive = 0;
		$this->set('cvs', $this->paginate());
	}

	public function view($id = null) {
		if (!$this->Cv->exists($id)) {
			throw new NotFoundException(__('Invalid cv'));
		}
		$options = array('conditions' => array('Cv.' . $this->Cv->primaryKey => $id));
		$this->set('cv', $this->Cv->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Cv->create();
			if ($this->Cv->save($this->request->data)) {
                $this->Cv->saveField('upload_time',date(DATE_ATOM));
                //xdebug(date(DATE_ATOM));
				$this->Session->setFlash(__('The cv has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cv could not be saved. Please, try again.'),'error_flash');
			}
		}
		$students = $this->Cv->Student->find('list');
		$this->set(compact('students'));
	}

	public function edit($id = null) {
		if (!$this->Cv->exists($id)) {
			throw new NotFoundException(__('Invalid cv'),'error_flash');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cv->save($this->request->data)) {
				$this->Session->setFlash(__('The cv has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cv could not be saved. Please, try again.'),'info_flash');
			}
		} else {
			$options = array('conditions' => array('Cv.' . $this->Cv->primaryKey => $id));
			$this->request->data = $this->Cv->find('first', $options);
		}
		$students = $this->Cv->Student->find('list');
		$this->set(compact('students'));
	}

	public function delete($id = null) {
		$this->Cv->id = $id;
		if (!$this->Cv->exists()) {
			throw new NotFoundException(__('Invalid cv'),'error_flash');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cv->delete()) {
			$this->Session->setFlash(__('Cv deleted'),'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cv was not deleted'),'info_flash');
		$this->redirect(array('action' => 'index'));
	}

    public function upload_cv_init(){
        $this->loadModel('Student');
        $current_student = $this->Auth->user();

        if($this->request->is('post')||$this->request->is('put')){
            $id = $current_student['id'];
            $cv = $this->request->data['Cv'];
            $cv['Student']['id'] = $id;

            if($this->Cv->sendData($cv)){
                $this->Session->setFlash(__('Your CV upload successful'),'success_flash');
                $this->redirect(array('controller'=>'students','action'=>'my_cv_data',$id));
            }
            else {
                $this->Session->setFlash(__('Your CV upload attempt failed, please try again'),'error_flash');
                $this->redirect(array('controller'=>'students','action' =>'my_cv_data',$id));
            }
        }
    }

    public function cv_manager($id=null){
        $this->loadModel('Student');

        $current_student = $this->Auth->user();
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'),'error_flash');
        }
        elseif($id != $current_student['id']) {
            $this->redirect(array('controller'=>'students','action' => 'my_profile'));
        }
        elseif(($current_student['approval_phase'] != 1)&&($current_student['approval_phase'] != 2)) {
            $this->redirect(array('controller'=>'students','action' => 'my_profile'));
        }
        elseif($current_student['freeze_state']!=0) {
            $this->redirect(array('controller'=>'students','action' => 'my_profile'));
        }

        $cvs_of_student = $this->Cv->find('all',
            array(
                'conditions'=>array(
                    'Cv.student_id' => $id
                ),
                'recursive'=>0
            )
        );
        $this->set('cvs',$cvs_of_student);
    }

    public function set_active_cv($id=null){
        $this->Cv->id = $id;
        if (!$this->Cv->exists()) {
            throw new NotFoundException(__('Invalid CV'),'error_flash');
        }

        $this->request->onlyAllow('post');
        $cv_primary = $this->Cv->findById($id);
        $student_id = $cv_primary['Student']['id'];
        $cvs_of_student = $this->Cv->find('all',
            array(
                'conditions'=>array(
                    'Cv.student_id' => $student_id
                ),
                'recursive'=>-1
            )
        );

        $count = 0;
        $save_data = array();

        foreach($cvs_of_student as $cv){
            if($cv['Cv']['id'] != $cv_primary['Cv']['id']){
                if($cv['Cv']['current']!=0){
                    $save_data[$count]['Cv']['id'] = $cv['Cv']['id'];
                    $save_data[$count]['Cv']['current'] = 0;
                    $count++;
                }
            }
            else{
                if($cv['Cv']['current']!=1){
                    $save_data[$count]['Cv']['id'] = $cv['Cv']['id'];
                    $save_data[$count]['Cv']['current'] = 1;
                    $count++;
                }
            }
        }

        if ($this->Cv->saveAll($save_data)) {
            $this->Session->setFlash(__('The CV has been set as active'),'success_flash');
            $this->redirect(array('action' => 'cv_manager',$student_id));
        } else {
            $this->Session->setFlash(__('Could not set this CV active. Please, try again.'),'error_flash');
            $this->redirect(array('action' => 'cv_manager',$student_id));
        }
    }
}
