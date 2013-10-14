<?php
App::uses('CakeEmail', 'Network/Email');

class EtheraEmail{

    public static function mailer($to=null,$subject=null,$body=null){
        $Email = new CakeEmail('gmail');
        $Email->to($to);
        $Email->subject($subject);
        $Email->from(array('postmaster.fnp@gmail.com' => "ETHERA Postmaster"));
        $Email->sender('ethera.rjt@gmail.com', 'ETHERA Postmaster');
        $Email->send($body);

        return true;
    }
}
?>