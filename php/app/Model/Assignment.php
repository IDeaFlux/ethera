<?php
App::uses('AppModel', 'Model');

class Assignment extends AppModel {


	public $displayField = 'id';


	public $belongsTo = array(
		'InterestedArea' => array(
			'className' => 'InterestedArea',
			'foreignKey' => 'interested_area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Cv' => array(
			'className' => 'Cv',
			'foreignKey' => 'assignment_id',
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
