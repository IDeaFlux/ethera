<?php
App::uses('AppModel', 'Model');
App::uses('Folder','Utility');

class SystemUser extends AppModel {


	public $displayField = 'email';


	public $validate = array(
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Enter your first name',
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Enter your last name',
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
                'message' => 'Enter a valid email address',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Email field cannot be empty',
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a password',
			),
		),
		'designation' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Enter your designation',
			),
		),
	);


	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public $hasMany = array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'system_user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Notice' => array(
			'className' => 'Notice',
			'foreignKey' => 'system_user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    public function uploadFile($id=null) {
        $file = $this->data['SystemUser']['photo'];

        if($file['error'] === UPLOAD_ERR_OK) {
            $folderName = APP.'webroot'.DS.'uploads'.DS.'system_users';
            $folder = new Folder($folderName, true, 0777);

            if($id!=null){
                if((file_exists($folderName.DS.$id))){
                    chmod($folderName.DS.$id,0755);
                    unlink($folderName.DS.$id);
                }
            }

            $id = String::uuid();

            if(move_uploaded_file($file['tmp_name'], $folderName.DS.$id)) {
                $this->data['SystemUser']['photo'] = $id;
                return true;
            }
        }

        $this->invalidate('photo','Failed to upload photo');

        return false;
    }

    public function sendData($data) {
        $this->create($data);
        if($this->uploadFile())
        {
            return $this->saveAll($this->data);
        }
        else{
            return false;
        }
    }

    public function deleteData($id=null) {
        if($id!=null){
            $this->id = $id;
            $system_user = $this->findAllById($id);
            $file = $system_user[0]['SystemUser']['photo'];

            $folderName = APP.'webroot'.DS.'uploads'.DS.'system_users';
            $folder = new Folder($folderName, true, 0777);

            if((file_exists($folderName.DS.$file))){
                chmod($folderName.DS.$file,0755);
                unlink($folderName.DS.$file);
            }

            return $this->delete();

        }
    }

    public function updateData($data) {
        $this->data = $data;

        $system_user = $this->data['SystemUser']['id'];
        $system_user = $this->findAllById($system_user);

        if($this->uploadFile($system_user[0]['SystemUser']['photo']))
        {
            return $this->saveAll($this->data);
        }
        else{
            return false;
        }
    }

    public function beforeSave($options=array()) {
        if (isset($this->data['SystemUser']['password'])) {
            $this->data['SystemUser']['password'] = AuthComponent::password($this->data['SystemUser']['password']);
        }
        return true;
    }

}