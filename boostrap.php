<?php


require 'vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(__DIR__);
$dotEnv->load();

//session_start();

if(getenv('APP_ENV') == 'development'){
    define('FB_CALLBACK','http://localhost/orientame/resultados.php?action=callback');
    define('TW_CALLBACK','http://localhost/orientame/sharer.php?action=callback&network=twitter');
    define('URL_PROFILE','http://localhost/orientame/profile.php');
}else{ #productions variables
    define('FB_CALLBACK','http://orientacionvocacional.guiame.org/resultados.php?action=callback');
    define('TW_CALLBACK','http://orientacionvocacional.guiame.org/sharer.php?action=callback&network=twitter');
    define('URL_PROFILE','http://orientacionvocacional.guiame.org/profile.php');
}
define('URL_APP_ANDROID', 'https://play.google.com/store/apps/details?id=com.whatsapp');
