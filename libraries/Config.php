<?php


use Abraham\TwitterOAuth\TwitterOAuth;

class Config {

    public static function twitter() {
        return new TwitterOAuth(getenv('TW_KEY'), getenv('TW_SECRET'));
    }

    public static function facebook() {
        return new \Facebook\Facebook([
            'app_id' => getenv('FB_KEY'),
            'app_secret' => getenv('FB_SECRET'),
            'default_graph_version' => 'v2.7'
        ]);
    }

}