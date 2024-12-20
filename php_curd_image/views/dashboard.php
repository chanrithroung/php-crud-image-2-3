<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <form action="../controllers/addProduct.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="">Product Name</label>
                                <input name="name" class="form-control" type="text">
                            </div>
                            <div class="col">
                                <label for="">Product Brand</label>
                                <input name="brand" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Product Price</label>
                                <input name="price" class="form-control" type="text">
                            </div>
                            <div class="col">
                                <label class="" for="thumbnail"><span>Thumbnail</span>  </label> <span class="ms-4 text-danger">Recommend size 300 x 250</span>
                                <input name="thumbnail" id="thumbnail" class="form-control" type="file">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for=""> Desctiption</label>
                            <textarea name="description" rows="5" class="form-control" id=""></textarea>
                        </div>
                        <div class="mt-5">
                            <button class="btn btn-primary">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>