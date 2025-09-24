<?php
class DB {
    private static $pdo;
    public static function Connect() {
        if(!self::$pdo){
            try {
                self::$pdo = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME , DB_USER, DB_PASSWORD,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]);
            } catch (PDOException $e){
                die("Database Connection:" . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}