<?php

session_start();
require 'boostrap.php';
use Abraham\TwitterOAuth\TwitterOAuth;

//test user : open_atxrtbi_user@tfbnw.net
//pass

Class Sharer {

    public static function share($data) {

        $data = \Firebase\JWT\JWT::decode($data['code'], getenv('APP_KEY'), ['HS256']);
        $_SESSION['network_uid'] = $data->uid;
        $_SESSION['network_message'] = $data->message;

        sleep(2);

        switch (strtolower($data->network)) {
            case 'facebook':

                $image = $image = "./results/{$data->uid}.png";

                $fb = Config::facebook();

                $fb->post('/me/photos', array(
                    'message' => $data->message,
                    $fb->fileToUpload($image)
                ), unserialize($_SESSION['fb_access_token']));

                Flash::message('Resultados compartidos en Facebook');
                header('Location:' . URL_PROFILE);

                break;


            case 'twitter':

                $connection = Config::twitter();
                $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => TW_CALLBACK));
                $loginURL = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
                header("location:$loginURL");
                break;

            default:
                header("Location:profile.php");
                break;

        }

    }

    public static function callback($data) {
        $uid = $_SESSION['network_uid'];
        $image = "./results/{$uid}.png";

        sleep(2);

        try {
            switch ($data['network']) {

             /*   case 'facebook':

                    $fb = Config::facebook();
                    $helper = $fb->getRedirectLoginHelper();

                    $accessToken = $helper->getAccessToken();

                    if (isset($accessToken)) {
                        // Logged in!
                        //$_SESSION['facebook_access_token'] = (string)$accessToken;

                        $fb->post('/me/photos', array(
                            'message' => $_SESSION['network_message'],
                            $fb->fileToUpload($image)
                        ), $accessToken);

                        Flash::message('Resultados compartidos en Facebook');
                    }


                    break;*/

                case 'twitter':

                    $connection = Config::twitter();
                    $connection->setTimeouts(10, 15);

                    $request_token = $connection->oauth('oauth/access_token', array('oauth_token' => $_REQUEST['oauth_token'], "oauth_verifier" => $_REQUEST['oauth_verifier']));

                    $connection = new TwitterOAuth(getenv('TW_KEY'), getenv('TW_SECRET'), $request_token['oauth_token'], $request_token['oauth_token_secret']);


                    $upload = $connection->upload('media/upload', array(
                        'media' => $image
                    ));

                    $status = $connection->post('statuses/update', array(
                        'status' => $_SESSION['network_message'],
                        'media_ids' => $upload->media_id
                    ));
                    Flash::message('Resultados compartidos en Twitter');


            }
        } catch (Exception $e) {
            error_log("Custom:" . $e->getMessage());
            Flash::error('Ha ocurrido un error, por favor inténtelo mas tarde');
        } finally {
            unset($_SESSION['network_message']);
        }

        header('Location: profile.php');
    }

}

$action = isset($_GET['action']) ? $_GET['action'] : '';
Sharer::{
    $action}($_GET);



