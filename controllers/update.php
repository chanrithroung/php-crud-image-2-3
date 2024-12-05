<?php
    require_once "../service/uploads.php";
    require_once "../model/db_connect.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $file = $_FILES['thumbnail'];
        $description = $_POST['description'];

        if($file['name']) $fileName = uploads($file);
        else $fileName = $_POST['old-thumbnail'];

        $sql = " UPDATE `products` SET `name` = '$name',
                 `brand` = '$brand', `price` = '$price', 
                 `thumbnail` = '$fileName',  `description` = '$description' WHERE `id` = '$id' ";

        $pdo = db_connect();
        $pdo->exec($sql);

        header("Location: ../views/list_product.php");

    }