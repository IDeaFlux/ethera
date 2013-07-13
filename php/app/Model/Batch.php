<?php
App::uses('AppModel', 'Model');

class Batch extends AppModel {


	public $displayField = 'academic_year';


	public $validate = array(
		'academic_year' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'registration_state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);


	public $hasMany = array(
		'Opportuny' => array(
			'className' => 'Opportuny',
			'foreignKey' => 'batch_id',
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
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'batch_id',
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
		'BatchesStudyProgram' => array(
			'className' => 'BatchesStudyProgram',
			'foreignKey' => 'batch_id',
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
