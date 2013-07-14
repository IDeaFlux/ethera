<?php
App::uses('AppModel', 'Model');

class Article extends AppModel {


	public $displayField = 'title';


	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'published_state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);


	public $hasOne = array(
		'Notice' => array(
			'className' => 'Notice',
			'foreignKey' => 'article_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


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
