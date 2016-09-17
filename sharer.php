<?php

//session_start();
require 'boostrap.php';
use Abraham\TwitterOAuth\TwitterOAuth;

Class Sharer {

    const MESSAGE = 'Mi resultado en Orientación Vocacional';


    public static function getConfig($type) {

        if ($type == 'facebook') {
            return new \Facebook\Facebook([
                'app_id' => getenv('FB_KEY'),
                'app_secret' => getenv('FB_SECRET'),
                'default_graph_version' => 'v2.7'
            ]);
        } else if ($type == 'twitter') {
            return new TwitterOAuth(getenv('TW_KEY'), getenv('TW_SECRET'));
        }
    }


    public static function share($data) {

        $data = \Firebase\JWT\JWT::decode($data['code'], getenv('APP_KEY'), ['HS256']);
        $_SESSION['network_uid'] = $data->uid;

        sleep(2);

        switch (strtolower($data->network)) {
            case 'facebook':

                $helper = static::getConfig('facebook')->getRedirectLoginHelper();
                $loginURL = $helper->getLoginUrl('http://localhost/orientame/sharer.php?action=callback&network=facebook', ['public_profile', 'publish_actions']);
                header("location:$loginURL");
                break;

            case 'twitter':

                $connection = static::getConfig('twitter');
                $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => 'http://dev.orientame.com/sharer.php?action=callback&network=twitter'));
                $loginURL = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
                header("location:$loginURL");
                break;

            default:
                header("Location:profile.php?id=" . ($data->uid * FACTOR));
                break;

        }

    }

    public static function callback($data) {
        $uid = $_SESSION['network_uid'];
        $image = "./results/{$uid}.png";

        sleep(2);

        try {
            switch ($data['network']) {

                case 'facebook':

                    $fb = static::getConfig('facebook');
                    $helper = $fb->getRedirectLoginHelper();

                    $accessToken = $helper->getAccessToken();

                    if (isset($accessToken)) {
                        // Logged in!
                        //$_SESSION['facebook_access_token'] = (string)$accessToken;

                        $fb->post('/me/photos', array(
                            'message' => static::MESSAGE,
                            $fb->fileToUpload($image)
                        ), $accessToken);

                        Flash::message('Resultados compartidos en Facebook');

                    }


                    break;

                case 'twitter':

                    $connection = static::getConfig('twitter');
                    $connection->setTimeouts(10, 15);

                    $request_token = $connection->oauth('oauth/access_token', array('oauth_token' => $_REQUEST['oauth_token'], "oauth_verifier" => $_REQUEST['oauth_verifier']));

                    $connection = new TwitterOAuth(getenv('TW_KEY'), getenv('TW_SECRET'), $request_token['oauth_token'], $request_token['oauth_token_secret']);


                    $upload = $connection->upload('media/upload', array(
                        'media' => $image
                    ));

                    $status = $connection->post('statuses/update', array(
                        'status' => static::MESSAGE,
                        'media_ids' => $upload->media_id
                    ));
                    Flash::message('Resultados compartidos en Twitter');


            }
        } catch (Exception $e) {
            Flash::error('Ha ocurrido un error, por favor inténtelo mas tarde');
        }

        header('Location: profile.php?id=' . ($uid * FACTOR));
    }

}

$action = isset($_GET['action']) ? $_GET['action'] : '';
Sharer::{
    $action}($_GET);



