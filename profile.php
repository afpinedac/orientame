<?php

require 'boostrap.php';
require 'model/User.php';


class MainController {


    public function getResults($id) {

        $user = User::find($id);

        $view = $user ? 'results.php' : 'user_not_found.php';

        $user = (object)$user;

        require('./view/_main.php');
    }

}


$mc = new MainController();


if (isset($_GET['id'])) {
    $mc->getResults($_GET['id']);
}
