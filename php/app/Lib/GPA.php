<?php
App::uses('Grading','Lib');

class GPA{
    public static function calculate($enrollments){
        if(!empty($enrollments)){
            $cum_gpa = 0;
            $cum_credit =0;

            foreach($enrollments as $enrollment){
                $cum_gpa = $cum_gpa + $enrollment['Enrollment']['course_unit']['CourseUnit']['credits']*(Grading::get_gpa($enrollment['Enrollment']['grade']));
                $cum_credit = $cum_credit + $enrollment['Enrollment']['course_unit']['CourseUnit']['credits'];
            }

            return round($cum_gpa/$cum_credit,3);
        }

        else{
            return false;
        }
    }
}
?>