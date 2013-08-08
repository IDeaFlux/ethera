<?php
App::uses('AppModel', 'Model');

class RegistrationNumHeader extends AppModel {


	public $displayField = 'name';


	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => '',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false,
				//'on' => 'create',
			),
		),
	);

	public $hasMany = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'registration_num_header_id',
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
		'StudyProgram' => array(
			'className' => 'StudyProgram',
			'foreignKey' => 'registration_num_header_id',
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
