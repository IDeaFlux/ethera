<!-- oauth-setup for standalone application -->


<?php
$cScope         =   'https://www.googleapis.com/auth/calendar';
$cClientID      =   '1077896430665-r2m8jhs76tehuccralfjd688vpfcdr9m.apps.googleusercontent.com';
$cClientSecret  =   'fqkcG3LiI7NH3QhQ-tCOtgVG';
$cRedirectURI   =   'urn:ietf:wg:oauth:2.0:oob';

$cAuthCode      =   '4/_J51Vnz-QF2ZsTCi7aWHqKeKG0z-.MvRK4xNdOOkaXE-sT2ZLcbRZxgR1gwI';

//refresh token -- 1/HneWiwqvhClUi80aa-c3nwtzpNizd0seiq8K7yny0yM

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