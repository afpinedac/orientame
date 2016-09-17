<?php



class Flash {

    const FLASH_KEY = 'orientame_044_ZaKwrT';
    const ERROR = 'error';
    const MESSAGE = 'message';

    public static function message($message) {
        $_SESSION[static::FLASH_KEY][static::MESSAGE][] = $message;
    }

    public static function error($error) {
        $_SESSION[static::FLASH_KEY][static::ERROR][] = $error;
    }

    public static function hasMessage() {
        return isset($_SESSION[static::FLASH_KEY][static::MESSAGE]);
    }

    public static function hasError() {
        return isset($_SESSION[static::FLASH_KEY][static::ERROR]);
    }

    public static function has($key) {
        return isset($_SESSION[static::FLASH_KEY][$key]);
    }

    public static function getError() {
        $value = $_SESSION[static::FLASH_KEY][static::ERROR];
        unset($_SESSION[static::FLASH_KEY][static::ERROR]);
        return $value;
    }

    public static function getMessage() {
        $value = $_SESSION[static::FLASH_KEY][static::MESSAGE];
        unset($_SESSION[static::FLASH_KEY][static::MESSAGE]);
        return $value;
    }

    public static function get($key) {
        $value = $_SESSION[static::FLASH_KEY][$key];
        unset($_SESSION[static::FLASH_KEY][$key]);
        return $value;
    }

    public static function set($key, $value) {
        $_SESSION[static::FLASH_KEY][$key] = $value;
    }

    public static function all() {
        return $_SESSION[static::FLASH_KEY];
    }

}
