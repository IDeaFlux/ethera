<?php
$cScope         =   'https://www.googleapis.com/auth/calendar';
$cClientID      =   '436819971634.apps.googleusercontent.com';
$cClientSecret  =   'Yiyth4xAHIV4L6vtrKPnHGiy';
$cRedirectURI   =   'urn:ietf:wg:oauth:2.0:oob';
  
$cAuthCode      =   '4/bMjGDK8aWQXOPEjg4XZdQoZKCiBx.UvgyfxxpIrsYXE-sT2ZLcbRjO4BhhAI';

//refresh token = 1/GYcsktptDOLESpblJlR62bg0AIxPTbkMSKGy6r2tLPw
 
if (empty($cAuthCode)) {
    $rsParams = array(
                        'response_type' =>   'code',
                        'client_id'     =>   $cClientID,
                        'redirect_uri'  =>   $cRedirectURI,
                        'scope'         =>   $cScope
                        );
    $cOauthURL = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query($rsParams);
    echo("Go to\n$cOauthURL\nand enter the given value into this script under \$cAuthCode\n");
    exit();
} // ends if (empty($cAuthCode))
elseif (empty($cRefreshToken)) {
    $cTokenURL = 'https://accounts.google.com/o/oauth2/token';
    $rsPostData = array(
                        'code'          =>   $cAuthCode,
                        'client_id'     =>   $cClientID,
                        'client_secret' =>   $cClientSecret,
                        'redirect_uri'  =>   $cRedirectURI,
                        'grant_type'    =>   'authorization_code',
                        );
    $ch = curl_init();
  
    curl_setopt($ch, CURLOPT_URL, $cTokenURL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $rsPostData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
    $cTokenReturn = curl_exec($ch);
    $oToken = json_decode($cTokenReturn);
    echo("Here is your Refresh Token for your application.  Do not loose this!\n\n");
    echo("Refresh Token = '" . $oToken->refresh_token . "';\n");
} // ends
?>
