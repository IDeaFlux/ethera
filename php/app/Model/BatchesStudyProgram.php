<?php
App::uses('AppModel', 'Model');

class BatchesStudyProgram extends AppModel {


	public $displayField = 'id';



	public $belongsTo = array(
		'Batch' => array(
			'className' => 'Batch',
			'foreignKey' => 'batch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StudyProgram' => array(
			'className' => 'StudyProgram',
			'foreignKey' => 'study_program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
