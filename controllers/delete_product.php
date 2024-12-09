<?php
    require_once "../model/db_connect.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
       $pdo = db_connect();
       $pdo->exec("DELETE FROM `products` WHERE `id` ='".$_POST['id']."';");
       header("Location: ../views/list_product.php?message=success");
    }
