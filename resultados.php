<?php

session_start();
require 'boostrap.php';

class ResultsController {


    public function init() {

        if (isset($_SESSION['fbid'])) {
            header('Location:profile.php');
        } else {
            $helper = Config::facebook()->getRedirectLoginHelper();
            $loginURL = $helper->getLoginUrl(FB_CALLBACK, ['public_profile', 'publish_actions']);
            header("location:$loginURL");
        }
    }


    public function callback() {

        $fb = Config::facebook();
        $helper = $fb->getRedirectLoginHelper();

        $accessToken = $helper->getAccessToken();

        if (!isset($accessToken)) {
            die('Invalid acccess token');
        }
        $_SESSION['fb_access_token'] = serialize($accessToken);

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=id,name', $accessToken);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();
        $_SESSION['fbid'] = $user['id'];


        header('Location:' . URL_PROFILE);
    }

}

$action = isset($_GET['action']) ? $_GET['action'] : 'init';

$rc = new ResultsController();

$rc->{$action}();



