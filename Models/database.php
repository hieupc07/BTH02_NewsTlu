<?php

class Database {
    private static $instance = null;
    private static $host = 'localhost'; 
    private static $dbName = 'tintuc';
    private static $username = 'root'; 
    private static $password = ''; 

    public static function connect() {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbName . ";charset=utf8",
                    self::$username,
                    self::$password
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}

?>