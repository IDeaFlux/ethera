<?php
App::uses('AppModel', 'Model');

class StudyProgramsCourseUnit extends AppModel {


	public $displayField = 'id';



	public $belongsTo = array(
		'StudyProgram' => array(
			'className' => 'StudyProgram',
			'foreignKey' => 'study_program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CourseUnit' => array(
			'className' => 'CourseUnit',
			'foreignKey' => 'course_unit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
