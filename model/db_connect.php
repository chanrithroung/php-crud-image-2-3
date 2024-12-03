<?php 
    function db_connect() {
        $HOST = '127.0.0.1';
        $USER = 'root';
        $PASSWORD = '';
        $SERVER_PORT = '3307';
        $DB_NAME = 'php_crud_image';
        
        try {
            $pdo = new PDO("mysql:localhost=$HOST;port$SERVER_PORT",$USER,$PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $DB_NAME";
            $pdo->exec($sql);
            $pdo->exec("USE $DB_NAME");
            return $pdo;
        } catch (PDOException $e) {
            echo $e;
        }
    }