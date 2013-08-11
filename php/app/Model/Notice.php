<?php
App::uses('AppModel', 'Model');
/**
 * Notice Model
 *
 * @property article $article
 * @property SystemUser $SystemUser
 */
class Notice extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the title',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date_start' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Please enter a valid date ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the starting date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date_end' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Please enter a valid date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the ending date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'published_state' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Enter your preference to publish /un-publish the notice',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
//	public $hasOne = array(
//		'Article' => array(
//			'className' => 'Article',
//			'foreignKey' => '',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		)
//	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'SystemUser' => array(
			'className' => 'SystemUser',
			'foreignKey' => 'system_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
