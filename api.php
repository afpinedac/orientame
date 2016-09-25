<?php

require 'boostrap.php';
require './model/User.php';

use Intervention\Image\ImageManagerStatic as Image;


class Orientame {

    public function __construct($method) {

        header('Content-Type: application/json');
        $action = $_GET['action'];


        if (!isset($_SERVER['HTTP_TOKEN']) || $_SERVER['HTTP_TOKEN'] != getenv('AUTH_TOKEN')) {
            http_response_code(401);
            echo json_encode((object)array('error' => 'Token de autorización inválido'));
            die();
        }

        try {
            $response = [];
            switch (strtoupper($method)) {
                case 'POST' :
                    if ($action == 'user') {
                        $response = (object)User::createOrUpdate((object)$_POST);
                        $response->_id = $response->id * FACTOR;
                        $response->url = URL_PROFILE . $response->_id;

                    } else if ($action == 'answer') {
                        $response = User::setAnswers($_GET['id'], (object)$_POST);
                    } else if ($action == 'clean') {
                        $response = User::setAnswers($_GET['id'], (object)array('answers' => ''));
                    } else if ($action == 'share') {

                        $user = \Firebase\JWT\JWT::decode($_POST['token'], getenv('APP_KEY'), ['HS256']);

                        $images = array(
                            'interests' => $_POST['interests'],
                            'skills' => $_POST['skills'],
                            'personality' => $_POST['personality'],
                            'description' => $_POST['description'],
                        );


                        Image::configure(array('driver' => 'gd'));

                        $fontPath = 'assets/fonts/Antonio-Regular.ttf';

                        $imgCanvas = Image::canvas(820, 800, '#fff');

                        $imgCanvas->text('Resultados', 390, 20, function($font) use ($fontPath){
                            $font->file($fontPath);
                            $font->color('#000');
                            $font->align('center');
                            $font->valign('top');
                            $font->size(40);
                        });

                        $imgCanvas->text('Personalidad', 180, 80, function($font) use ($fontPath){
                            $font->file($fontPath);
                            $font->color('#000');
                            $font->align('center');
                            $font->valign('top');
                            $font->size(24);
                        });

                        $imgCanvas->text('Interéses', 600, 80, function($font) use($fontPath) {
                            $font->file($fontPath);
                            $font->color('#000');
                            $font->align('center');
                            $font->valign('top');
                            $font->size(24);
                        });

                        $imgCanvas->text('Habilidades', 200, 350, function($font) use($fontPath){
                            $font->file($fontPath);
                            $font->color('#000');
                            $font->align('center');
                            $font->valign('top');
                            $font->size(24);
                        });


                        $imgCanvas->text('Descripción', 600, 400, function($font) use($fontPath) {
                            $font->file($fontPath);
                            $font->color('#000');
                            $font->align('center');
                            $font->valign('top');
                            $font->size(24);
                        });


                        //$imgCanvas->text('Resultados Orientación Vocacional');
                        $imgDescription = Image::make($_POST['description']);
                        $imgInterests = Image::make($_POST['interests'])->resize(400, 240);
                        $imgPersonality = Image::make($_POST['personality'])->resize(400, 200);
                        $imgSkills = Image::make($_POST['skills'])->resize(350,350);


                        $imgCanvas->insert($imgSkills, 'top-left', 10, 400);
                        $imgCanvas->insert($imgInterests, 'top-left', 410, 120);
                        $imgCanvas->insert($imgPersonality, 'top-left', 10, 120);
                        $imgCanvas->insert($imgDescription, 'top-left', 400, 440);


                        $imgCanvas->save("results/{$user->id}.png");

                        $user = (object)User::setImage($user->id, $images);

                        $response = array(
                            'code' => \Firebase\JWT\JWT::encode(
                                [
                                    'uid' => $user->id,
                                    'network' => strtolower($_GET['type']),
                                    'message' => $_POST['message']
                                ],
                                getenv('APP_KEY'))
                        );

                    }
                    break;
                case 'GET' :

                    if ($action == 'user') {
                        $response = (object)User::find($_GET['id']);
                        $response->_id = $response->id * FACTOR;
                        $response->url = URL_PROFILE . $response->_id;
                    }
                    break;
            }

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode((object)array('error' => 'Hubo un error en el request', 'msg' => $e->getMessage()));
            die();
        }


        if (!$response) {
            http_response_code(400);
            echo json_encode((object)array('error' => 'Hubo un error en el request'));
            die();
        }

        echo json_encode($response);

    }


}

$orientame = new Orientame($_SERVER['REQUEST_METHOD']);

