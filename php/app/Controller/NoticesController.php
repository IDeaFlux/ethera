<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'GoogleApi/Google_Client');
App::import('Vendor', 'GoogleApi/contrib/Google_CalendarService');
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
        //echo debug($articles);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

        $authUser=$this->Auth->user('id');

		if ($this->request->is('post')) {
            debug($this->request->data);

            //get date fields separately and save data; not necessary
            $data=$this->request->data;
            $save_year=$data['Notice']['date_start']['year'];
            $save_month=$data['Notice']['date_start']['month'];
            $save_day=$data['Notice']['date_start']['day'];
            $save_hour=$data['Notice']['date_start']['hour'];
            $save_min=$data['Notice']['date_start']['min'];
            $start_date=$save_year."-".$save_month."-".$save_day." ".$save_hour.":".$save_min.":00";
            debug($start_date);





            $this->Notice->create();

			if ($this->Notice->save($this->request->data)) {
                $this->Notice->saveField('system_user_id',$authUser);

              //save separately collected date; not necessary
                $this->Notice->saveField('date_start',$start_date);

                // get the current date and time
               // $this->Notice->saveField('date_start', date("Y-m-d H:i:s"));
               // $this->Notice->saveField('date_end', date("Y-m-d H:i:s"));



//                $data=array(
//                    'data'=>array(
//                        'title'=>'hi',
//                        'date_start'=>'2013-08-15',
//                        'date_end'=>'2013-08-16'
//
//                    )
//                );

               // $this->Notice->createEvent($data);
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

   /* public function createEvent($handle, $quick = false, $details, $title = null, $transparency = null, $status = null, $location = null, $start = null, $end = null) {
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
        //url for my calendar
        //https://www.googleapis.com/calendar/v3/calendars/4v8414r52l021tvvkn46jg0pms@group.calendar.google.com/events

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
    } */

        //Get the access token for the session

        public function get_access_token(){
            //$this->autoRender = false;
            $tokenURL = 'https://accounts.google.com/o/oauth2/token';
            $postData = array(
                'client_secret'=>'fqkcG3LiI7NH3QhQ-tCOtgVG',
                'grant_type'=>'refresh_token',
                'refresh_token'=>'1/HneWiwqvhClUi80aa-c3nwtzpNizd0seiq8K7yny0yM',
                'client_id'=>'1077896430665-r2m8jhs76tehuccralfjd688vpfcdr9m.apps.googleusercontent.com'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $tokenURL);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $tokenReturn = curl_exec($ch);
            $token = json_decode($tokenReturn);
            //var_dump($tokenReturn);
            $accessToken = $token->access_token;
            debug($accessToken);
            return $accessToken;
        }

    // The example method header
    //function create_post_argsJSON($date,$starttime,$endtime,$title){

    public function create_post_request($date1,$date2,$starttime,$endtime,$title){
       // $date_start = $this->Article->find('date_start', array(
         //   'conditions' => array('Notice.id' => '82')

        //get the data hardcoded
//        $date1='2013-10-15';
//        $date2='2013-10-25';
//        $starttime='18:00';
//        $endtime='19:00';
//        $title='Hello success';
        $arg_list = func_get_args();
        foreach($arg_list as $key => $arg){
            $arg_list[$key] = urlencode($arg);
        }
        //2013-06-07T10:00:00.000-07:00
        $postargs = <<<JSON
{
 "end": {
  "dateTime": "{$date2}T{$starttime}:00.000+05:30"
 },
  "start": {
  "dateTime": "{$date1}T{$endtime}:00.000+05:30"
 },
 "summary": "$title",
 "description": "$title"
}
JSON;


        $postargs2 = <<<JSON
{
"end": {
"dateTime": "2013-06-23T10:00:00.000-07:00"
},
"start": {
"dateTime": "2013-06-07T10:00:00.000-07:00"
}
}
JSON;


        return $postargs;
        //debug($postargs2);
        //debug(json_decode($postargs2,true));

    }

    function send_post_request(){
        $APIKEY='AIzaSyBfLo0ws22tbW8I5r3ctNcRHsTuXEHIABI';
        $cal='84175rm5je1sfg2oafoufvhsjs@group.calendar.google.com';
        $request = 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events?pp=1&key=' . $APIKEY;

        //$auth = json_decode($_SESSION['oauth_access_token'],true);

        //var_dump($auth);

        $session = curl_init($request);

        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST
        curl_setopt ($session, CURLOPT_POSTFIELDS, $this->create_post_request());
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, true);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_VERBOSE, true);
        curl_setopt($session, CURLINFO_HEADER_OUT, true);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type:  application/json','Authorization:  Bearer ' . $this->get_access_token(),'X-JavaScript-User-Agent:  Mount Pearl Tennis Club Bookings'));

        $response = curl_exec($session);

        //echo '<pre>';
        //var_dump(curl_getinfo($session, CURLINFO_HEADER_OUT));
        //echo '</pre>';

        curl_close($session);
        $this->set('response',$response);
        //return $response;
    }



}