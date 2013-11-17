<?php
class Convention{
    public static function size($bytes, $precision = 2){
            $kilobyte = 1024;
            $megabyte = $kilobyte * 1024;
            $gigabyte = $megabyte * 1024;
            $terabyte = $gigabyte * 1024;

            if (($bytes >= 0) && ($bytes < $kilobyte)) {
                return $bytes . ' B';

            } elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
                return round($bytes / $kilobyte, $precision) . ' KB';

            } elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
                return round($bytes / $megabyte, $precision) . ' MB';

            } elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
                return round($bytes / $gigabyte, $precision) . ' GB';

            } elseif ($bytes >= $terabyte) {
                return round($bytes / $terabyte, $precision) . ' TB';
            } else {
                return $bytes . ' B';
            }
    }

    public static function approval_stat($digit=null){
        if(!empty($digit)){
            switch ($digit) {
                case 0:
                    return "Not Approved from Public Registration";
                    break;
                case 1:
                    return "Approved from Public Registration";
                    break;
                case 2:
                    return "Submitted Interested Areas";
                    break;
                case 3:
                    return "Approved from Submission of Initial Interested Areas";
                    break;
                case 4:
                    return "Submitted Organizations related to Interested Areas";
                    break;
                case 5:
                    return "Approved from Submission of Organizations related to Interested Areas";
                    break;
                case 7:
                    return "Disapproved from Submission of Organizations related to Interested Areas";
                    break;
                case 8:
                    return "Disapproved from Submission of Initial Interested Areas";
                    break;
                case 9:
                    return "Disapproved from Registration";
                    break;
                default:
                    return null;
            }
        }
    }

    public static function approval_phase_stat($digit=null){
        if(!empty($digit)){
            switch ($digit) {
                case 0:
                    return "Registered";
                    break;
                case 1:
                    return "Interested Area Submission";
                    break;
                case 2:
                    return "Organization Submission";
                    break;
                default:
                    return null;
            }
        }
    }

    public static function assignment_state($digit=null){
        if(!empty($digit)){
            switch ($digit) {
                case 0:
                    return "N/A";
                    break;
                case 1:
                    return "Submitted Interested Area";
                    break;
                case 2:
                    return "Submitted Organization";
                    break;
                case 3:
                    return "Selected for Interviews";
                    break;
                case 4:
                    return "Interview Passed";
                    break;
                case 5:
                    return "Interview Failed";
                    break;
                default:
                    return null;
            }
        }
    }

    public static function weight_value($flag=null){
        //Always $WE+$WG == 1
        $WG = 0.7;
        $WE = 0.3;
        if($flag=='WG'){ //GPA Weight
            return $WG;
        }
        if($flag=='WE'){ //Extra Activity Weight
            return $WE;
        }
    }
}
?>