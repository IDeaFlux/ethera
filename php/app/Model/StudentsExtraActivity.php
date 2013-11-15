<?php
App::uses('AppModel', 'Model');

class StudentsExtraActivity extends AppModel {


    public $displayField = 'id';



    public $belongsTo = array(
        'Student' => array(
            'className' => 'Student',
            'foreignKey' => 'student_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ExtraActivity' => array(
            'className' => 'ExtraActivity',
            'foreignKey' => 'extra_activity_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
