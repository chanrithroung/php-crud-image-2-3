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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>List Product</title>
</head>
<body class="bg-light">
    <?php 
        if( !empty(isset($_GET['message'])) ) 
            echo '<script>
                    $(document).ready(function(){
                        swal({
                            title: "Product Delete Success",
                            text: "Product Delete Success!",
                            icon: "success",
                            button: "ok!",
                        });
                    })
                </script>';
    ?>

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
                                        <a href="edit_product.php?id='.$product['id'].'" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                                        <button class="btn btn-remove btn-danger" data-remove-id="'.$product['id'].'" data-bs-toggle="modal" href="#modal-delete" role="button"><i class="bi bi-trash"></i> Remove</button>
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
<script>
    $(document).ready(function(){
        $(".btn-remove").click(function(){
            $("#remove-id").val($(this).attr('data-remove-id'));
        });
    })
</script>
</html>



<div class="modal fade" id="modal-delete" aria-hidden="true" aria-labelledby="ModalDeleteToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Are you sure</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Next time you can backup all data!
      </div>
      <div class="modal-footer">
        <form action="../controllers/delete_product.php" method="post">
            <input name="remove-id" id="remove-id" type="">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-octagon"></i> Cancel</button>
            <button type="submit" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal"> <i class="bi bi-trash3"></i> Confirm Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>