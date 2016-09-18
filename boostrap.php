<?php


require 'vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(__DIR__);
$dotEnv->load();

session_start();
define('FACTOR', 404);


if(getenv('APP_ENV') == 'development'){
    define('FB_CALLBACK','http://localhost/orientame/sharer.php?action=callback&network=facebook');
    define('TW_CALLBACK','http://localhost/orientame/sharer.php?action=callback&network=twitter');
}else{ #productions variables
    define('FB_CALLBACK','http://orientacionvocacional.guiame.org/sharer.php?action=callback&network=facebook');
    define('TW_CALLBACK','http://orientacionvocacional.guiame.org/sharer.php?action=callback&network=twitter');
}




