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

    public function uploadFile() {
        $file = $this->data['SystemUser']['photo'];

        if($file['error'] === UPLOAD_ERR_OK) {
            $id = String::uuid();
            $folderName = APP.'webroot'.DS.'uploads'.DS.'system_users';
            $folder = new Folder($folderName, true, 0777);

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
        $this->uploadFile();
        //echo debug($this->data,true,true);
        //echo debug($data,true,true);
        return $this->saveAll($this->data);
    }

    public function beforeSave($options=array()) {
        if (isset($this->data['SystemUser']['password'])) {
            $this->data['SystemUser']['password'] = AuthComponent::password($this->data['SystemUser']['password']);
        }
        return true;
    }

}
