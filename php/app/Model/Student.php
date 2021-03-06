<?php
App::uses('AppModel', 'Model');
App::uses('Folder','Utility');

class Student extends AppModel {


	public $displayField = 'reg_number';


	public $validate = array(
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter first name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false,
				//'on' => 'create',
			),
		),
		'middle_name' => array(
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter last name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false,
				//'on' => 'create',
			),
		),
        'full_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter full name',
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
				'message' => 'Enter a valid email',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter password',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between',5,255),
				'message' => 'Password should more than 5 characters',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'match_passwords' => array(
                'rule' => 'matchPasswords',
                'message' => 'Your password did not match'
            ),
		),
        'password_confirmation' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please confirm your password',
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
				'message' => 'Please enter Registration number as three digits',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date_of_birth' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Enter a valid date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a birth date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address1' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter an address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address2' => array(
		),
		'city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a city',
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
		),
        'StudentsExtraActivity' => array(
			'className' => 'StudentsExtraActivity',
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
        'SpecialOpportunity' => array(
            'className' => 'SpecialOpportunity',
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

    public function matchPasswords($data) {
        if($data['password'] == $this->data['Student']['password_confirmation']) {
            return true;
        }
        $this->invalidate('password_confirmation','Your password did not match');
        return false;
    }

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

            $tmp_file = $file['tmp_name'];
            list($width, $height) = getimagesize($tmp_file);

            if ($width == null && $height == null) {
                $this->invalidate('photo','Photo upload error');
                return false;
            }

            if ($width >= 160 && $height >= 160) {
                $image = new Imagick($tmp_file);
                $image->thumbnailImage(160, 160);
                $image->writeImage($folderName.DS.$id);
                $this->data['Student']['photo'] = $id;
                return true;
            }
            else{
                move_uploaded_file($file['tmp_name'], $folderName.DS.$id);
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

        $student = $this->data['Student']['id'];
        $student = $this->findById($student);

        if($this->uploadFile($student['Student']['photo'])){
            return $this->saveAll($this->data);
        }
        else{
            return false;
        }
    }

    public function savePassword($data){

        $student = $this->findById($data['Student']['id']);
        $current_password_hashed = AuthComponent::password($data['Student']['current_password']);

        if($student['Student']['password'] == $current_password_hashed){
            if($data['Student']['new_password'] == $data['Student']['repeat_new_password']){
                $student_save['Student']['id'] = $data['Student']['id'];
                $student_save['Student']['password'] = $data['Student']['new_password'];
                if($this->save($student_save)){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                $this->invalidate('repeat_new_password','Your new password did not match');
                return false;
            }
        }
        else{
            $this->invalidate('current_password','Wrong current password');
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
