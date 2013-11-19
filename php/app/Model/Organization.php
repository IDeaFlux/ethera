<?php
App::uses('AppModel', 'Model');

class Organization extends AppModel {

    public $displayField = 'name';

	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please fill in Organization name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please fill in Organization address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please fill in valid email address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

    public function uploadFile($id=null) {
        $file = $this->data['Organization']['logo'];

        if($file['error'] === UPLOAD_ERR_OK) {
            $folderName = APP.'webroot'.DS.'uploads'.DS.'organizations';
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
                $this->invalidate('logo','Photo upload error');
                return false;
            }

            if ($width >= 160 && $height >= 160) {
                $image = new Imagick($tmp_file);
                $image->thumbnailImage(160, 160);
                $image->writeImage($folderName.DS.$id);
                $this->data['Organization']['logo'] = $id;
                return true;
            }
            else{
                move_uploaded_file($file['tmp_name'], $folderName.DS.$id);
                $this->data['Organization']['logo'] = $id;
                return true;
            }
        }
        $this->invalidate('logo','Photo upload error');
        return false;
    }


    public function updateData($data) {
        $this->data = $data;

        $organization = $this->data['Organization']['id'];
        $organization = $this->findById($organization);

        if($this->uploadFile($organization['Organization']['logo'])){
            return $this->saveAll($this->data);
        }
        else{
            return false;
        }
    }

	public $hasMany = array(
		'Assignment' => array(
			'className' => 'Assignment',
			'foreignKey' => 'organization_id',
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
			'foreignKey' => 'organization_id',
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
		'Opportunity' => array(
			'className' => 'Opportunity',
			'foreignKey' => 'organization_id',
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

}
