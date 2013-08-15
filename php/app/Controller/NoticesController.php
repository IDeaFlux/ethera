<?php
App::uses('AppController', 'Controller');
/**
 * Notices Controller
 *
 * @property Notice $Notice
 */
class NoticesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Notice->recursive = 0;
		$this->set('notices', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'));
		}
		$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
		$this->set('notice', $this->Notice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

        $authUser=$this->Auth->user('id');

		if ($this->request->is('post')) {
			$this->Notice->create();
			if ($this->Notice->save($this->request->data)) {
                $this->Notice->saveField('system_user_id',$authUser);
                //call the calender creation method
               // $this->Notice->creteCalender();
				$this->Session->setFlash(__('The notice has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notice could not be saved. Please, try again.'),'error_flash');
			}
		}
//		$systemUsers = $this->Notice->SystemUser->find('list'); //get all available system users
//		$this->set(compact('systemUsers'));

        //$this->set('authUser',$this->Auth->user('id'));  //to set variable to get in view


        //removed due to recursive obj creation
//        $articles=$this->Notice->Article->find('list',array('conditions'=>array(
//            'Article.system_user_id'=>$authUser,
//        )));
//        $this->set('articles',$articles);

        $this->loadModel('Article');
        $articles=$this->Article->find('list',array('conditions'=>array(
          'Article.system_user_id'=>$authUser,
       )));
        $this->set('articles',$articles);



	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'),'error_flash');
		}

        $authUser=$this->Auth->user('id');
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Notice->save($this->request->data)) {
                $this->Notice->saveField('system_user_id',$authUser);
				$this->Session->setFlash(__('The notice has been saved'),'success_flash');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notice could not be saved. Please, try again.'),'error_flash');
			}
		} else {
			$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
			$this->request->data = $this->Notice->find('first', $options);
		}
//		$systemUsers = $this->Notice->SystemUser->find('list');
//		$this->set(compact('systemUsers'));


        $this->loadModel('Article');
        $articles=$this->Article->find('list',array('conditions'=>array(
            'Article.system_user_id'=>$authUser,
        )));
        $this->set('articles',$articles);


    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Notice->id = $id;
		if (!$this->Notice->exists()) {
			throw new NotFoundException(__('Invalid notice'),'error_flash');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Notice->delete()) {
			$this->Session->setFlash(__('Notice deleted'),'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Notice was not deleted'),'info_flash');
		$this->redirect(array('action' => 'index'));
	}

// Google calender create function

    public function createCalendar($title, $details, $timezone, $hidden, $color, $location) {
        if ($this->authenticated === false) {
            return false;
        } else if (empty($title) || empty($timezone) || !is_bool($hidden) || empty($color) || empty($location)) {
            return false;
        }

        $data = array(
            "data" => array(
                "title" => $title,
                "details" => $details,
                "timeZone" => $timezone,
                "hidden" => $hidden,
                "color" => $color,
                "location" => $location
            )
        );

        $headers = array('Content-type: application/json');

        $ch = $this->curlPostHandle("https://www.google.com/calendar/feeds/default/Ethera Events/full", true, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HEADER, true);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response_headers = $this->http_parse_headers($response);

        curl_close($ch);
        unset($ch);

        if ($http_code == 302) {

            $url = $response_headers['Location'];

            $ch = $this->curlPostHandle($url, true, $headers);

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($http_code == 201) {
                return json_decode($response);
            } else {
                return false;
            }

        } else if ($http_code == 201) {
            return json_decode($response);
        } else {
            return false;
        }
    }
}