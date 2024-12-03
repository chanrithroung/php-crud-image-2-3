<?php

    require_once "../model/db_connect.php";

    $pdo = db_connect();

    $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
    $statement = $pdo->query($sql);
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);

    // print_r($products);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body class="bg-light">
    <div class="container-fluid p-0" style="height: 100vh;">
        <div class="row">

            <div class="col-2 p-0">
                <div class="p-0 shadow-lg rounded py-5" style="height: 100vh;">
                    <h2  class="h4 text-center">Admin | Dashboard </h2>
                </div>
            </div>

            <div class="col">
                <div class="shadow-lg p-3 mt-3 rounded-pill px-5">
                    Admin
                </div>
                <div class="container shadow-lg mt-5 p-5 rounded-3">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Thumbnail</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach ($products as $product)
                                echo '
                                <tr class="align-middle">
                                    <td>'.$product['id'].'</td>
                                    <td>'.$product['name'].'</td>
                                    <td>'.$product['brand'].'</td>
                                    <td>$'.$product['price'].'</td>
                                    <td>
                                        <img style="width: 5em;" src="http://localhost/myphp/php_curd_image/uploads/'.$product['thumbnail'].'" alt="thumbnail">
                                    </td>
                                    <td>'.$product['created_at'].'</td>
                                    <td>
                                        <button class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Edit</button>
                                        <button class="btn btn-danger"><i class="bi bi-trash"></i> Remove</button>
                                    </td>
                                </tr>';
                            ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</body>
</html>