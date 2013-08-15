<?php
App::uses('AppModel', 'Model');

class Enrollment extends AppModel {



	public $belongsTo = array(
		'CourseUnit' => array(
			'className' => 'CourseUnit',
			'foreignKey' => 'course_unit_id',
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
