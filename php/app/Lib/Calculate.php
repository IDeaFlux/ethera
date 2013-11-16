<?php
App::uses('Grading','Lib');
App::uses('Convention','Lib');

class Calculate{
    public static function GPA($enrollments){
        if(!empty($enrollments)){
            $cum_gpa = 0;
            $cum_credit =0;

            foreach($enrollments as $enrollment){
                if($enrollment['Enrollment']['grade']!=''){
                    $cum_gpa = $cum_gpa + $enrollment['Enrollment']['CourseUnit']['credits']*(Grading::get_gpa($enrollment['Enrollment']['grade']));
                    $cum_credit = $cum_credit + $enrollment['Enrollment']['CourseUnit']['credits'];
                }
            }
            return round($cum_gpa/$cum_credit,3);
        }

        else{
            return false;
        }
    }

    public static function ExtraActivities($extra_activities){
        if(!empty($extra_activities)){
            $number_of_ea = count($extra_activities);
            $total = 0;

            foreach($extra_activities as $extra_activity){
                $total = $total + $extra_activity['mark'];
            }
            return round($total/$number_of_ea,3);
        }

        else{
            return false;
        }
    }

    public static function FinalMark($gpa,$extra_activities){
        if(!empty($gpa)&&!empty($extra_activities)){
            return round((Convention::weight_value('WG')*$gpa)+(Convention::weight_value('WE')*$extra_activities),3);
        }
    }
}
?>