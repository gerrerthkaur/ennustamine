<?php

// Facebook PHP SDK
// https://developers.facebook.com/docs/php/gettingstarted
require_once( 'facebook/facebook.php' );

// Configuration
require_once( 'config.php' );

// https://developers.facebook.com/apps/
$config = array(
    'appId' => APP_ID,
    'secret' => SECRET,
    'allowSignedRequest' => false
);

$facebook = new Facebook( $config );
$user_id = $facebook->getUser();

// https://developers.facebook.com/docs/php/howto/profilewithgraphapi
if( $user_id ) {

    try {

        $profile = $facebook->api( '/me', 'GET' );

        if( ! in_array( $profile['username'], $whitelist ) ) {
            require( 'denied.php' );
            die();
        }

    } catch( FacebookApiException $e ) {

        $login_url = $facebook->getLoginUrl();
        require( 'login.php' );
        die();

    }

} else {

    $login_url = $facebook->getLoginUrl(); 
    require( 'login.php' );
    die();

}
