<?php
class Grading{
    public static function get_gpa($grade=null){
        $fixed_grades = array(
            'A+'=>4.0,
            'A'=>4.0,
            'A-'=>3.7,
            'B+'=>3.3,
            'B'=>3.0,
            'B-'=>2.7,
            'C+'=>2.3,
            'C'=>2.0,
            'C-'=>1.7,
            'D+'=>1.3,
            'D'=>1.0,
            'E'=>0
        );

        foreach($fixed_grades as $key => $value){
            if($key == $grade){
                return $value;
                break;
            }
            else{
                continue;
            }
        }
    }
}
?>