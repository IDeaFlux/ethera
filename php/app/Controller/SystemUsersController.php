<?php
App::uses('AppController', 'Controller');

class SystemUsersController extends AppController {


	public function index() {
		$this->SystemUser->recursive = 0;
		$this->set('systemUsers', $this->paginate());
	}


	public function view($id = null) {
		if (!$this->SystemUser->exists($id)) {
			throw new NotFoundException(__('Invalid system user'),'error_flash');
		}
		$options = array('conditions' => array('SystemUser.' . $this->SystemUser->primaryKey => $id));
		$this->set('systemUser', $this->SystemUser->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {

            if ($this->SystemUser->sendData($this->request->data)) {
                $this->Session->setFlash(__('The system user has been saved'),'success_flash');
                //echo debug($this->request->data,true,true);
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The system user could not be saved. Please, try again.'),'error_flash');
            }
		}
		$groups = $this->SystemUser->Group->find('list');
		$this->set(compact('groups'));
	}


	public function edit($id = null) {
		if (!$this->SystemUser->exists($id)) {
			throw new NotFoundException(__('Invalid system user'),'error_flash');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SystemUser->save($this->request->data)) {
				$this->Session->setFlash(__('The system user has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system user could not be saved. Please, try again.'),'error_flash');
			}
		} else {
			$options = array('conditions' => array('SystemUser.' . $this->SystemUser->primaryKey => $id));
			$this->request->data = $this->SystemUser->find('first', $options);
		}

		$groups = $this->SystemUser->Group->find('list');
		$this->set(compact('groups'));
	}


	public function delete($id = null) {
		$this->SystemUser->id = $id;
		if (!$this->SystemUser->exists()) {
			throw new NotFoundException(__('Invalid system user'),'error_flash');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SystemUser->delete()) {
			$this->Session->setFlash(__('System user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('System user was not deleted'),'info_flash');
		$this->redirect(array('action' => 'index'));
	}

    public function login() {
        if($this->request->is('post')){
            if($this->Auth->login()){
                //$this->redirect($this->Auth->redirect());
                $this->redirect(array('controller'=>'homes','action'=>'admin'));
            }
            else{
                $this->Session->setFlash('Your email & password combination is incorrect','error_flash');
            }
        }
    }

    public function logout() {
        $this->Session->setFlash('Logged out successfully','success_flash');
        $this->redirect($this->Auth->logout());
    }

    public function forgot_password() {
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                $post_email = $this->request->data['SystemUser']['email'];
                $system_user = $this->SystemUser->find('first',array(
                    'conditions' => array('SystemUser.email' => $post_email)
                ));
                if(empty($system_user)){
                    $this->Session->setFlash('The email you entered was invalid','error_flash');
                    $this->redirect(array('controller'=>'system_users','action'=>'forgot_password'));
                }
                else{
                    $system_user = $this->_generate_password_token($system_user);
                    if($this->User->save($system_user) && $this->_send_forgot_password_email($system_user['SystemUser']['id'])){
                        $this->Session->setFlash('Password reset instructions have been sent to your email address.
You have 24 hours to complete the request.','success_flash');
                        $this->redirect(array('controller'=>'system_users','action'=>'forgot_password'));
                    }
                }
            }
        }
    }

    public function reset_password_token($reset_password_token = null){
        if(empty($this->request->data)){
            $system_user = $this->SystemUser->findByResetPasswordToken($reset_password_token);
            if(!empty($system_user['User']['reset_password_token']) && !empty($system_user['User']['token_created_at']) && $this->_valid_token($system_user['User']['token_created_at'])){
                $_SESSION['token'] = $reset_password_token;
            }
            else{
                $this->Session->setFlash('The password reset request has either expired or is invalid','error_flash');
                $this->redirect(array('controller'=>'system_users','action'=>'login'));
            }
        }
        else{
            if ($this->request->data['User']['reset_password_token'] != $_SESSION['token']) {
                $this->Session->setflash('The password reset request has either expired or is invalid.','error_flash');
                $this->redirect(array('controller'=>'system_users','action'=>'login'));
            }

            $system_user = $this->User->findByResetPasswordToken($this->request->data['User']['reset_password_token']);
            $this->SystemUser->id = $system_user['User']['id'];

            if ($this->User->save($this->request->data, array('validate' => 'only'))) {
                $this->request->data['User']['reset_password_token'] = $this->request->data['User']['token_created_at'] = null;
                if ($this->User->save($this->request->data) && $this->_send_password_update_success_email($system_user['User']['id'])) {
                    unset($_SESSION['token']);
                    $this->Session->setflash('Your password was changed successfully. Please login to continue.','success_flash');
                    $this->redirect(array('controller'=>'system_users','action'=>'login'));
                }
            }
        }
    }

    protected function _generate_password_token($user){
        if (empty($user)) {
            return null;
        }

        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33,79)) : $token .= chr(rand(80,126));
        }

        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;

        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }

        $user['User']['reset_password_token'] = $hash;
        $user['User']['token_created_at'] = date('Y-m-d H:i:s');

        return $user;
    }

    protected function _valid_token($token_created_at){
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }

    protected function _send_forgot_password_email($id = null){

    }

    protected function _send_password_update_success_email($id = null){

    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('forgot_password');
    }
}
