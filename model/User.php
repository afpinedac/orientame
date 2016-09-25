<?php

class User {

    private static $db = NULL;

    private static function db() {
        if (static::$db) {
            return static::$db;
        }
        //static::$db = new PDO("mysql:host=127.0.0.1;dbname=orientame", "root", "ticad3mia!..2016");
        static::$db = new PDO(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'));
        //DB_HOST=mysql:host=127.0.0.1;dbname=orientame;port=3306  DB_USER=root DB_PASS=root
        //static::$db = new PDO('mysql:host=127.0.0.1;dbname=orientame;port=3306', 'root', 'root');
        static::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return static::$db;

    }


    public static function createOrUpdate($user) {

        $u = static::findByFacebook($user->facebook_id);

        if (!$u) {
            $data = static::db()->exec("INSERT INTO users(facebook_id, first_name, last_name,facebook_access_token,url_image, gender, email, birthday )
            VALUES('{$user->facebook_id}','{$user->first_name}','{$user->last_name}','{$user->facebook_access_token}','{$user->url_image}','{$user->gender}','{$user->email}','{$user->birthday}')");

            return $data ? static::find(static::lastID()) : false;
        }


        $q = "UPDATE users set first_name = '{$user->first_name}', last_name = '{$user->last_name}',email = '{$user->email}', facebook_access_token = '{$user->facebook_access_token}' WHERE id = {$u['id']}";


        $r = static::db()->exec($q);

        return $r !== false ? static::find($u['id']) : false;
    }

    public static function setImage($id, $image) {

        $q = "UPDATE users set img_interests = '{$image['interests']}', img_skills = '{$image['interests']}',img_personality = '{$image['personality']}', img_description = '{$image['description']}' WHERE id = {$id}";

        $r = static::db()->exec($q);

        return $r !== false ? static::find($id) : false;

    }


    public static function find($id) {
        return static::db()->query("SELECT id, facebook_id,  email, first_name, last_name, answers, url_image  FROM users WHERE id={$id}")->fetch(PDO::FETCH_ASSOC);

    }

    public static function setAnswers($id, $data) {
        $r = static::db()->exec("UPDATE users set answers = '{$data->answers}' WHERE id = {$id}");

        return $r !== false ? static::find($id) : false;
    }


    public static function findByFacebook($id) {
        return static::db()->query("SELECT id, facebook_id,  email, first_name, last_name, answers, url_image  FROM users WHERE facebook_id={$id}")->fetch(PDO::FETCH_ASSOC);
    }

    private static function lastID() {
        $stmt = static::db()->query("SELECT MAX(id) FROM users");
        $lastId = $stmt->fetch(PDO::FETCH_NUM);
        return $lastId[0];
    }

}
