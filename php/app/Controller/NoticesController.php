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
           // debug($this->request->data);

            //get date fields separately and save data; not necessary
//            $data=$this->request->data;
//            $save_year=$data['Notice']['date_start']['year'];
//            $save_month=$data['Notice']['date_start']['month'];
//            $save_day=$data['Notice']['date_start']['day'];
//            $save_hour=$data['Notice']['date_start']['hour'];
//            $save_min=$data['Notice']['date_start']['min'];
//            $start_date=$save_year."-".$save_month."-".$save_day." ".$save_hour.":".$save_min.":00";
//            debug($start_date);


            $data=$this->request->data;
            $save_year=$data['Notice']['date_start']['year'];
            $save_month=$data['Notice']['date_start']['month'];
            $save_day=$data['Notice']['date_start']['day'];
            $save_hour=$data['Notice']['date_start']['hour'];
            $save_min=$data['Notice']['date_start']['min'];
            //$date1=$save_year."-".$save_month."-".$save_day;
            //$starttime=$save_hour.":".$save_min;
            $start_date=$save_year."-".$save_month."-".$save_day."T".$save_hour.":".$save_min.":00.000+05:30";
            //debug($date1);
            //debug($starttime);
            //debug($start_date);


            $save_year=$data['Notice']['date_end']['year'];
            $save_month=$data['Notice']['date_end']['month'];
            $save_day=$data['Notice']['date_end']['day'];
            $save_hour=$data['Notice']['date_end']['hour'];
            $save_min=$data['Notice']['date_end']['min'];
            //$date2=$save_year."-".$save_month."-".$save_day;
            //$endtime=$save_hour.":".$save_min;
            $end_date=$save_year."-".$save_month."-".$save_day."T".$save_hour.":".$save_min.":00.000+05:30";
            //debug($date2);
            //debug($starttime);

            $title=$data['Notice']['title'];
            $calpost=$data['Notice']['published_to_cal'];

           // debug($data['Notice']['article_id']);



            $this->Notice->create();


			if ($this->Notice->save($this->request->data)) {
                $this->Notice->saveField('system_user_id',$authUser);
//

                if($calpost==1){
                    //create event return the eventId
                $response = $this->send_post_request($start_date,$end_date,$title);
                  //  debug($response);

                    //list all eventIds
                    $eventId=$this->list_events();
                    $this->set('eventId',$eventId);
                    //debug($eventId);
                    $this->Notice->saveField('event_id',$response);

                    //Update event
                    $start_date='2013-10-04T10:00:00.000-07:00';
                    $end_date='2013-10-10T10:00:00.000-07:00';
                    $title='updated';
                  //  $update = $this->update_event($start_date,$end_date,$title,$id);
                    //debug($update);

                }
                

              //save separately collected date; not necessary
             //   $this->Notice->saveField('date_start',$start_date);

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
			if ($this->Notice->saveAll($this->request->data)) {
                $this->Notice->saveField('system_user_id',$authUser);



                //Newly Inserted for edit calender post

                $data=$this->request->data;
                $save_year=$data['Notice']['date_start']['year'];
                $save_month=$data['Notice']['date_start']['month'];
                $save_day=$data['Notice']['date_start']['day'];
                $save_hour=$data['Notice']['date_start']['hour'];
                $save_min=$data['Notice']['date_start']['min'];

                $start_date=$save_year."-".$save_month."-".$save_day."T".$save_hour.":".$save_min.":00.000+05:30";

                $save_year=$data['Notice']['date_end']['year'];
                $save_month=$data['Notice']['date_end']['month'];
                $save_day=$data['Notice']['date_end']['day'];
                $save_hour=$data['Notice']['date_end']['hour'];
                $save_min=$data['Notice']['date_end']['min'];

                $end_date=$save_year."-".$save_month."-".$save_day."T".$save_hour.":".$save_min.":00.000+05:30";

                $title=$data['Notice']['title'];
                $calpost=$data['Notice']['published_to_cal'];

                $result = $this->Notice->find('first', array(
                    'conditions' => array('Notice.id' => $id)

                ));
                //debug($result['Notice']['event_id']);
                $eventId=$result['Notice']['event_id'];

                if($calpost==1){
                    $response = $this->update_event($start_date,$end_date,$title,$eventId);

                     // debug($response);
                    $this->Notice->saveField('event_id',$response);


                }

                //End of the newly additions

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

        $result = $this->Notice->find('first', array(
            'conditions' => array('Notice.id' => $id)

        ));
        //debug($result['Notice']['event_id']);
        $eventId=$result['Notice']['event_id'];
        $this->delete_event($eventId);

      	$this->request->onlyAllow('post', 'delete');
		if ($this->Notice->delete()) {

			$this->Session->setFlash(__('Notice deleted'),'success_flash');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Notice was not deleted'),'info_flash');
		$this->redirect(array('action' => 'index'));
	}

    // Google Calendar Integration

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
           // debug($accessToken);
            return $accessToken;
        }



//    public function create_post_request(){

//
//        //get the data hardcoded
//        $date1='2013-10-15';
//        $date2='2013-10-25';
//        $starttime='18:00';
//        $endtime='19:00';
//        $title='Hello success';
//        $arg_list = func_get_args();
//        foreach($arg_list as $key => $arg){
//            $arg_list[$key] = urlencode($arg);
//        }
//        //2013-06-07T10:00:00.000-07:00
//        $postargs = <<<JSON
//{
// "end": {
//  "dateTime": "{$date2}T{$starttime}:00.000+05:30"
// },
//  "start": {
//  "dateTime": "{$date1}T{$endtime}:00.000+05:30"
// },
// "summary": "$title",
// "description": "$title"
//}
//JSON;
//
//
//        $postargs2 = <<<JSON
//{
//"end": {
//"dateTime": "2013-06-23T10:00:00.000-07:00"
//},
//"start": {
//"dateTime": "2013-06-07T10:00:00.000-07:00"
//}
//}
//JSON;
//
//
//        return $postargs;
//        //debug($postargs2);
//        //debug(json_decode($postargs2,true));
//
//    }

    // Create/Post an Event in the Calendar
    function send_post_request($start_date,$end_date,$title){
        $APIKEY='AIzaSyBfLo0ws22tbW8I5r3ctNcRHsTuXEHIABI';
        $cal='84175rm5je1sfg2oafoufvhsjs@group.calendar.google.com';
       // $request = 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events?pp=1&key=' . $APIKEY;
        $request = 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events?pp=1&fields=id&key=' . $APIKEY;

        //$auth = json_decode($_SESSION['oauth_access_token'],true);

        //var_dump($auth);

        $arg_list = func_get_args();
        foreach($arg_list as $key => $arg){
            $arg_list[$key] = urlencode($arg);
        }
        //2013-06-07T10:00:00.000-07:00
        $postargs = <<<JSON
{
 "end": {
  "dateTime": "$end_date"
 },
  "start": {
  "dateTime": "$start_date"
 },
 "summary": "$title",
 "description": "$title"
}
JSON;

   // debug($postargs);

        $session = curl_init($request);

        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST


        // $save_year=$data['Notice']['date_start']['year'];
        curl_setopt ($session, CURLOPT_POSTFIELDS,$postargs);
        // Tell curl not to return headers, but do return the response
        //curl_setopt($session, CURLOPT_HEADER, true);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_VERBOSE, true);
        //curl_setopt($session, CURLINFO_HEADER_OUT, true);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type:  application/json','Authorization:  Bearer ' . $this->get_access_token(),'X-JavaScript-User-Agent:  Mount Pearl Tennis Club Bookings'));

        $response = curl_exec($session);
        $data=json_decode($response,true);
        $eventId=$data['id'];


        //echo '<pre>';
        //var_dump(curl_getinfo($session, CURLINFO_HEADER_OUT));
        //echo '</pre>';

        curl_close($session);
        //$this->set('response',$response);
        return $eventId;
    }

    // Delete an event in the Calendar

function delete_event($eventId){
    $APIKEY='AIzaSyBfLo0ws22tbW8I5r3ctNcRHsTuXEHIABI';
    $cal='84175rm5je1sfg2oafoufvhsjs@group.calendar.google.com';
    $request = 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events/'.$eventId.'?&key=' . $APIKEY;

    //$auth = json_decode($_SESSION['oauth_access_token'],true);

    //var_dump($auth);

//    $arg_list = func_get_args();
//    foreach($arg_list as $key => $arg){
//        $arg_list[$key] = urlencode($arg);
//    }

    $session = curl_init($request);

    //tell curl this is a delete request

    curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'DELETE');
    // Tell curl not to return headers, but do return the response
    curl_setopt($session, CURLOPT_HEADER, true);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($session, CURLOPT_VERBOSE, true);
    curl_setopt($session, CURLINFO_HEADER_OUT, true);
    curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type:  application/json','Authorization:  Bearer ' . $this->get_access_token(),'X-JavaScript-User-Agent:  Mount Pearl Tennis Club Bookings'));

    $response = curl_exec($session);


    curl_close($session);
    //$this->set('response',$response);
   // return $response;
}

    // Return the Calendar ID function

    function list_events(){
        $APIKEY='AIzaSyBfLo0ws22tbW8I5r3ctNcRHsTuXEHIABI';
        $cal='84175rm5je1sfg2oafoufvhsjs@group.calendar.google.com';
        $request = 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events/?fields=items%2Fid&key='. $APIKEY;


        //$auth = json_decode($_SESSION['oauth_access_token'],true);

        //var_dump($auth);

//    $arg_list = func_get_args();
//    foreach($arg_list as $key => $arg){
//        $arg_list[$key] = urlencode($arg);
//    }

        $session = curl_init($request);

        //tell curl this is a delete request

        curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'GET');
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, true);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_VERBOSE, true);
        curl_setopt($session, CURLINFO_HEADER_OUT, true);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type:  application/json','Authorization:  Bearer ' . $this->get_access_token(),'X-JavaScript-User-Agent:  Mount Pearl Tennis Club Bookings'));

        $response = curl_exec($session);


        curl_close($session);
        //$this->set('response',$response);
        return $response;
    }


    //Update Event in Google Calendar

    function update_event($start_date,$end_date,$title,$eventId){
        $APIKEY='AIzaSyBfLo0ws22tbW8I5r3ctNcRHsTuXEHIABI';
        $cal='84175rm5je1sfg2oafoufvhsjs@group.calendar.google.com';

        // $request = 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events?pp=1&key=' . $APIKEY;
        $request = 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events/'. $eventId .'?fields=id&key=' . $APIKEY;

        //$auth = json_decode($_SESSION['oauth_access_token'],true);

        //var_dump($auth);
//
//        $arg_list = func_get_args();
//        foreach($arg_list as $key => $arg){
//            $arg_list[$key] = urlencode($arg);
//        }
        //2013-06-07T10:00:00.000-07:00
        $postargs = <<<JSON
{
 "end": {
  "dateTime": "$end_date"
 },
  "start": {
  "dateTime": "$start_date"
 },
 "summary": "$title",
 "description": "$title"
}
JSON;

        // debug($postargs);

        $session = curl_init($request);

        // Tell curl to use HTTP PUT
        curl_setopt($session, CURLOPT_CUSTOMREQUEST,'PATCH');
        // Tell curl that this is the body of the POST


        // $save_year=$data['Notice']['date_start']['year'];
        curl_setopt ($session, CURLOPT_POSTFIELDS,$postargs);
        curl_setopt($session,CURLOPT_INFILESIZE,0);
        // Tell curl not to return headers, but do return the response
        //curl_setopt($session, CURLOPT_HEADER, true);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_VERBOSE, true);
        curl_setopt($session, CURLINFO_HEADER_OUT, true);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type:  application/json','Authorization:  Bearer ' . $this->get_access_token(),'X-JavaScript-User-Agent:  Mount Pearl Tennis Club Bookings'));

        $response = curl_exec($session);

        $data=json_decode($response,true);
        $eventId=$data['id'];

        //echo '<pre>';
        //var_dump(curl_getinfo($session, CURLINFO_HEADER_OUT));
        //echo '</pre>';

        curl_close($session);
        //$this->set('response',$response);
        return $eventId;
    }


}