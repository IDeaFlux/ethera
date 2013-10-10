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

        $authUser=$this->Auth->user('id');

		if (!$this->Notice->exists($id)) {
			throw new NotFoundException(__('Invalid notice'));
		}
		$options = array('conditions' => array('Notice.' . $this->Notice->primaryKey => $id));
		$this->set('notice', $this->Notice->find('first', $options));

        $this->loadModel('Article');
        $articles=$this->Article->find('all',array('conditions'=>array(
            'Article.system_user_id'=>$authUser,
        )));
        $this->set('articles',$articles);
        echo debug($articles);
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

                $data=array(
                    'data'=>array(
                        'title'=>'hi',
                        'date_start'=>'2013-08-15',
                        'date_end'=>'2013-08-16'

                    )
                );
               // debug($data);
                $this->Notice->createEvent($data);
                //call the calender creation method

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
				$this->Session->setFlash(__('The notice has been saved.'),'success_flash');
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

// Google calender create event function

    public function createEvent($handle, $quick = false, $details, $title = null, $transparency = null, $status = null, $location = null, $start = null, $end = null) {
        if ($this->authenticated === false) {
            return false;
        } else if ($quick === false && (empty($title) || empty($transparency) || empty($status) || empty($location) || empty($start) || empty($end))) {
            return false;
        } else if ($quick === true && empty($details)) {
            return false;
        }

        if (empty($handle)) {
            $handle = "default";
        }

        if ($quick === true) {
            $data = array("data" => array(
                "details" => $details,
                "quickAdd" => true
            )
            );
            $data = json_encode($data);
        } else {
            $data = sprintf('{
                "data": {
                "title": "%s",
                "details": "%s",
                "transparency": "%s",
                "status": "%s",
                "location": "%s",
                "when": [
                {
                "start": "%s",
                "end": "%s"
                }
                ]
                }
                }', $title, $details, $transparency, $status, $location, date("c", strtotime($start)), date("c", strtotime($end)));

        }

        $headers = array('Content-Type: application/json');

        $url = sprintf("https://www.google.com/calendar/feeds/%s/private/full", $handle);
        $ch = $this->curlPostHandle($url, true, $headers);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, true);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response_headers = $this->http_parse_headers($response);

        curl_close($ch);
        unset($ch);

        if ($http_code == 302) {

            $url = $response_headers['Location'];

            $ch = $this->curlPostHandle($url, true, $headers);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

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

    // Google Calendar delete event function

    function deleteEvent($handle, $id, $etag = null) {
        if ($this->authenticated === false) {
            return false;
        } else if (empty($handle) || empty($id)) {
            return false;
        }

        if (empty($handle)) {
            $handle = "default";
        }

        if (!empty($etag)) {

            if (substr($etag, 0, 1) != '"') {
                $etag = '"' . $etag;
            }
            if (substr($etag, -1, 1) != '"') {
                $etag .= '"';
            }

            $headers = array('If-Match: ' . $etag);
        } else {
            $headers = array('If-Match: *');
        }

        $url = sprintf("https://www.google.com/calendar/feeds/%s/private/full/%s", $handle, $id);
        $ch = $this->curlDeleteHandle($url, true, $headers);

        curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        return ($http_code == 200);
    }


    // Google Calendar Update event

    function updateEvent($handle, $id, $etag, $json) {
        if ($this->authenticated === false) {
            return false;
        } else if (empty($handle) || empty($id) || empty($json)) {
            return false;
        } else if (!is_object(json_decode($json))) {
            return false;
        } else {
            $json = json_encode(json_decode($json));
        }

        if (empty($handle)) {
            $handle = "default";
        }

        $headers = array('Content-type: application/json');


        if (!empty($etag)) {

            if (substr($etag, 0, 1) != '"') {
                $etag = '"' . $etag;
            }
            if (substr($etag, -1, 1) != '"') {
                $etag .= '"';
            }

            $headers[] = 'If-Match: ' . $etag;
        } else {
            $headers[] = 'If-Match: *';
        }

        $url = sprintf("https://www.google.com/calendar/feeds/%s/private/full/%s", $handle, $id);
        $ch = $this->curlPutHandle($url, true, $headers);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HEADER, true);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response_headers = $this->http_parse_headers($response);

        curl_close($ch);
        unset($ch);

        if ($http_code == 302) {

            $url = $response_headers['Location'];

            $ch = $this->curlPutHandle($url, true, $headers);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($http_code == 200) {
                return json_decode($response);
            } else {
                return false;
            }

        } else if ($http_code == 200) {
            return json_decode($response);
        } else {
            return false;
        }
    }
}