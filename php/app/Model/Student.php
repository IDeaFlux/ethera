<?php
App::uses('AppModel', 'Model');
App::uses('Folder','Utility');

class Student extends AppModel {


	public $displayField = 'reg_number';


	public $validate = array(
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => '',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false,
				//'on' => 'create',
			),
		),
		'middle_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => '',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false,
				//'on' => 'create',
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => '',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false,
				//'on' => 'create',
			),
		),
        'gender' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select a gender',
            ),
        ),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between',5,10),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'reg_number' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gender' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date_of_birth' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address1' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address2' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'study_program_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'batch_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StudyProgram' => array(
			'className' => 'StudyProgram',
			'foreignKey' => 'study_program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Batch' => array(
			'className' => 'Batch',
			'foreignKey' => 'batch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'RegistrationNumHeader' => array(
            'className' => 'RegistrationNumHeader',
            'foreignKey' => 'registration_num_header_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Assignment' => array(
			'className' => 'Assignment',
			'foreignKey' => 'student_id',
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
		'Cv' => array(
			'className' => 'Cv',
			'foreignKey' => 'student_id',
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
		'Enrollment' => array(
			'className' => 'Enrollment',
			'foreignKey' => 'student_id',
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
		'Feedback' => array(
			'className' => 'Feedback',
			'foreignKey' => 'student_id',
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
        $file = $this->data['Student']['photo'];

        if($file['error'] === UPLOAD_ERR_OK) {
            $folderName = APP.'webroot'.DS.'uploads'.DS.'students';
            $folder = new Folder($folderName, true, 0777);

            if($id!=null){
                if((file_exists($folderName.DS.$id))){
                    chmod($folderName.DS.$id,0755);
                    unlink($folderName.DS.$id);
                }
            }

            $id = String::uuid();

            if(move_uploaded_file($file['tmp_name'], $folderName.DS.$id)) {
                $this->data['Student']['photo'] = $id;

                return true;
            }
        }
        $this->invalidate('photo','Photo upload error');
        return false;
    }

    public function sendData($data) {
        $data['Student']['group_id'] = 4;
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
            $file = $system_user[0]['Student']['photo'];

            $folderName = APP.'webroot'.DS.'uploads'.DS.'students';
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

        $system_user = $this->data['Student']['id'];
        $system_user = $this->findAllById($system_user);

        if($this->uploadFile($system_user[0]['Student']['photo'])){
            return $this->saveAll($this->data);
        }
        else{
            return false;
        }
    }

    public function beforeSave($options=array()) {
        if (isset($this->data['Student']['password'])) {
            $this->data['Student']['password'] = AuthComponent::password($this->data['Student']['password']);
        }
        return true;
    }

}
