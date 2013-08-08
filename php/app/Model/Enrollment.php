<?php
App::uses('AppModel', 'Model');
/**
 * Enrollment Model
 *
 * @property CourseUnit $CourseUnit
 * @property Student $Student
 */
class Enrollment extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
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
