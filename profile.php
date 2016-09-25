<?php

session_start();
require 'boostrap.php';
require 'model/User.php';


class MainController {


    public function results() {


        if (!isset($_SESSION['fbid'])) {

            Flash::error('Necesitas estar logueado');

            header('Location: index.php');
        }

        $id = $_SESSION['fbid'];

        $user = User::findByFacebook($id);


        $view = $user ? '_results.php' : '_user_not_found.php';

        $user = (object)$user;

        $user->token = isset($user->id) ? \Firebase\JWT\JWT::encode(['id' => $user->id], getenv('APP_KEY')) : '';

        require('./view/_main.php');
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
    }

}

$action = isset($_GET['action']) ? ($_GET['action']) : 'results';

$mc = new MainController();
$mc->{$action}();

