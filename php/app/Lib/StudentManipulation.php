<?php
class StudentManipulation{
    public static function gpa_sort($students){
        if(!empty($students)){
            usort($students, function($a, $b) {
                $a = $a['GPA'];
                $b = $b['GPA'];
                if ($a == $b) { return 0; }
                return ($a < $b) ? 1 : -1;
            });

            return $students;
        }

        else{
            return false;
        }
    }
}

?>
