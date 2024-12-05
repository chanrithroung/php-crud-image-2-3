<?php
    require_once "../model/db_connect.php";
    require_once "../service/uploads.php";
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $file = $_FILES['thumbnail'];
        $fileName = uploads($file);

        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        
        $pdo = db_connect();

        $sql = "INSERT INTO `products`( `name`, `brand`, `price`, `thumbnail`, `description`) 
                    VALUES ('$name','$brand','$price','$fileName','$description');";
        
        $pdo->exec($sql);

        header("Location: ../views/dashboard.php");


    }
    