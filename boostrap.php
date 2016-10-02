<?php


require 'vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(__DIR__);
$dotEnv->load();

//session_start();
define('FACTOR', 404);
define('URL_APP_ANDROID','https://play.google.com/store?hl=es');


if(getenv('APP_ENV') == 'development'){
    define('FB_CALLBACK','http://localhost/orientame/sharer.php?action=callback&network=facebook');
    define('TW_CALLBACK','http://localhost/orientame/sharer.php?action=callback&network=twitter');
    define('URL_PROFILE','http://localhost/orientame/profile.php?id=');
    define('URL_APP','http://localhost/orientame/');
}else{ #productions variables
    define('FB_CALLBACK','http://orientacionvocacional.guiame.org/sharer.php?action=callback&network=facebook');
    define('TW_CALLBACK','http://orientacionvocacional.guiame.org/sharer.php?action=callback&network=twitter');
    define('URL_PROFILE','http://orientacionvocacional.guiame.org/profile.php?id=');
    define('URL_APP','http://orientacionvocacional.guiame.org/');
}

