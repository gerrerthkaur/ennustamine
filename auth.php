<?php

// Facebook PHP SDK
// https://developers.facebook.com/docs/php/gettingstarted
require_once( 'facebook/facebook.php' );

// https://developers.facebook.com/apps/
$config = array(
    'appId' => '208509829348356',
    'secret' => '1153d5d78657b734da267c3fa7093b06',
    'allowSignedRequest' => false
);

$facebook = new Facebook( $config );
$user_id = $facebook->getUser();

// https://developers.facebook.com/docs/php/howto/profilewithgraphapi
if( $user_id ) {

    try {

        $profile = $facebook->api( '/me', 'GET' );

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
