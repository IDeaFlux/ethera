<?php
App::uses('AppModel', 'Model');

class Cv extends AppModel {


	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'student_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'reviewed_state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'upload_time' => array(
			'datetime' => array(
				'rule' => array('datetime'),
			),
		),
	);

	public $belongsTo = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public function uploadCv($data,$id=null) {
        $file = $data['cv'];

        if($file['error'] === UPLOAD_ERR_OK) {
            $folderName = APP.'webroot'.DS.'uploads'.DS.'cvs';
            $folder = new Folder($folderName, true, 0777);

            if($id!=null){
                if((file_exists($folderName.DS.$id))){
                    chmod($folderName.DS.$id,0755);
                    unlink($folderName.DS.$id);
                }
            }

            $file_name = String::uuid();

            if(move_uploaded_file($file['tmp_name'], $folderName.DS.$file_name.'.pdf')) {

                return $file_name.'.pdf';
            }
        }
        $this->invalidate('photo','Photo upload error');
        return false;
    }

    public function sendData($file) {
        $save_data['Cv']['upload_time'] = strftime("%Y-%m-%d %H:%M:%S", time());
        $save_data['Cv']['reviewed_state'] = 0;
        $save_data['Cv']['student_id'] = $file['Student']['id'];

        $this->create($save_data);
        if($save_data['Cv']['file_name'] = $this->uploadCv($file,null))
        {
            return $this->save($save_data);
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
}
