// oauth-setup for web application

<?php
$cScope         =   'https://www.googleapis.com/auth/calendar';
$cClientID      =   '1077896430665.apps.googleusercontent.com';
$cClientSecret  =   '7ICseY230U8x54FBj6MaH2Ak';
//$cRedirectURI   =   'http://ethera-udinnet.rhcloud.com/';
$cRedirectURI = 'http://ethera-udinnet.rhcloud.com';


$cAuthCode      =   '4/aVBSl7NhRXrklUygqhGCaoJnq9P0.cimdlMT-58wXXE-sT2ZLcbQht8ZzgwI';
//$cAuthCode      =   '4/c-cAScpP-WjPUAMrylUQEk2cdUV2.MhObkQ-17PUXXE-sT2ZLcbRPbmtzgwI';

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