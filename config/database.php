<?php

class Database {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            $dsn = "mysql:host=localhost;dbname=mglsi_news;charset=utf8";
            self::$instance = new PDO($dsn, 'mglsi_user', 'passer', [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }
        return self::$instance;
    }
}