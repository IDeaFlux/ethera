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

}
