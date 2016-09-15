<?php

require './model/User.php';

class Orientame {

    public function __construct($method) {
        $action = $_GET['action'];

        $response = [];
        switch (strtoupper($method)) {
            case 'POST' :
                if ($action == 'user') {
                    $response = User::createOrUpdate((object)$_POST);
                } else if ($action == 'answer') {
                    $response = User::setAnswers($_GET['id'], (object)$_POST);
                } else if ($action == 'clean') {
                    $response = User::setAnswers($_GET['id'], (object)array('answers' => ''));
                }
                break;
            case 'GET' :

                if ($action == 'user') {
                    $response = User::find($_GET['id']);
                }
                break;
        }
        header('Content-Type: application/json');

        if (!$response) {
            http_response_code(400);
            echo json_encode((object)array('error' => 'Hubo un error en el request'));
            die();
        }

        echo json_encode($response);

    }


}

$orientame = new Orientame($_SERVER['REQUEST_METHOD']);

