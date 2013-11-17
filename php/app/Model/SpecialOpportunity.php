<?php
App::uses('AppModel', 'Model');

class SpecialOpportunity extends AppModel {


	public $displayField = 'id';


	public $validate = array(
		'student_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'organization_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'assignment_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		),
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Assignment' => array(
			'className' => 'Assignment',
			'foreignKey' => 'assignment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
