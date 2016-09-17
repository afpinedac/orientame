<?php


require 'vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(__DIR__);
$dotEnv->load();

session_start();
define('FACTOR', 404);




