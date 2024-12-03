<?php
    require_once "../model/db_connect.php";
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fileName = $_FILES['thumbnail']['name'];
        $fileName = rand(0, 99999999).date('Y-m-d-h-i-s').'.'.pathinfo($fileName, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../uploads/'.$fileName); 
       
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
    