<?php
App::uses('AppController', 'Controller');
App::uses('Calculate','Lib');
App::uses('StudentManipulation','Lib');

class ReportsController extends AppController{

    public function result_sheet($id=null){
        $this->loadModel('Student');
        if($id!=null)
        {
            $student = $this->Student->find('first',array('conditions'=>array('Student.id'=>$id),'recursive'=>2));
            //debug($student);
            $enrollments = $student['Enrollment'];

            $count = 0;
            foreach($enrollments as $enrollment){
                $gpa_enrollments[$count]['Enrollment'] = $enrollment;
                $count++;
            }
            $gpa = Calculate::GPA($gpa_enrollments);

            $this->set('enrollments',$enrollments);
            $this->set('gpa',$gpa);
            $this->set('student',$student);
        }
    }
}

?>