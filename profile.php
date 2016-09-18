<?php

require 'boostrap.php';
require 'model/User.php';


class MainController {


    public function getResults($id) {

        $user = User::find((int)($id / FACTOR));

        $view = $user ? '_results.php' : '_user_not_found.php';

        $user = (object)$user;

        $user->token = \Firebase\JWT\JWT::encode(['id' => $user->id], getenv('APP_KEY'));

        require('./view/_main.php');
    }

}


$mc = new MainController();

if (isset($_GET['id'])) {
    $mc->getResults($_GET['id']);
}
