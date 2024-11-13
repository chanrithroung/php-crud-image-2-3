<?php 
    require_once "db_connect.php";


    function createTable() {
        $pdo = db_connect();
        $sql = "CREATE TABLE IF NOT EXISTS products(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(150) NOT NULL,
            brand VARCHAR(50) NOT NULL,
            price DECIMAL(8,2) DEFAULT 0.00,
            thumbnail VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        $pdo->exec($sql);
    }


    createTable();