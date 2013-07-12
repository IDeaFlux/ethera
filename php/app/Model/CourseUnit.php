<?php
App::uses('AppModel', 'Model');

class CourseUnit extends AppModel {


	public $displayField = 'name';


	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
	
			),
		),
		'credits' => array(
			'numeric' => array(
				'rule' => array('numeric'),

			),
		),
		'level' => array(
			'numeric' => array(
				'rule' => array('numeric'),

			),
		),
		'subject_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),

			),
		),
	);


	public $belongsTo = array(
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subject_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public $hasMany = array(
		'Follow' => array(
			'className' => 'Follow',
			'foreignKey' => 'course_unit_id',
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



	public $hasAndBelongsToMany = array(
		'StudyProgram' => array(
			'className' => 'StudyProgram',
			'joinTable' => 'study_programs_course_units',
			'foreignKey' => 'course_unit_id',
			'associationForeignKey' => 'study_program_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
