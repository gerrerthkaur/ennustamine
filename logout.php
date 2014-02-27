<?php
require_once( 'config.php' );

// Clear Facebook session - kinda hacky
session_start();
session_unset();
session_destroy();

// Redirect after logout
header( 'Location: ' . LOGOUT_REDIRECT );
die();
