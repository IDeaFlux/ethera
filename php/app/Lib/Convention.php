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
}
?>