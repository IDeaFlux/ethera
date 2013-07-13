<?php
App::uses('AppModel', 'Model');

class StudyProgram extends AppModel {


	public $displayField = 'program_code';


	public $validate = array(
		'program_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);


	public $hasMany = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'study_program_id',
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



	public $hasAndBelongsToMany = array(
		'CourseUnit' => array(
			'className' => 'CourseUnit',
			'joinTable' => 'study_programs_course_units',
			'foreignKey' => 'study_program_id',
			'associationForeignKey' => 'course_unit_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'InterestedArea' => array(
			'className' => 'InterestedArea',
			'joinTable' => 'study_programs_interested_areas',
			'foreignKey' => 'study_program_id',
			'associationForeignKey' => 'interested_area_id',
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
