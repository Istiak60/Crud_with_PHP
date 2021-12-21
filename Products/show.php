<?php
$_id = $_GET['id'];
$webroot = "http://localhost/CRUD/admin/";
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM `product` WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam('id', $_id);

$result = $stmt->execute();
$product = $stmt->fetch();





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Show details</title>
</head>

<body>


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <h1 class="text-center mb-4"> Details </h1>

                    <dl class="row">
                        <dt class="col-md-3">ID</dt>
                        <dd class="col-md-9"><?= $product['id']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Name</dt>
                        <dd class="col-md-9"><?= $product['title']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Is Active</dt>
                        <dd class="col-md-9">
                            <?php

                            echo $product['is_active'] ? 'Activated' : 'Deactivated';
                            ?>


                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Is Deleted</dt>
                        <dd class="col-md-9">
                            <?php

                            echo $product['is_deleted'] ? 'Deleted' : ' Not Deleted';
                            ?>


                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Created At</dt>
                        <dd class="col-md-9"><?= $product['created_at']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Modified At</dt>
                        <dd class="col-md-9"><?= $product['modified_at']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Picture</dt>
                        <dd class="col-md-9"><img src="<?= $webroot; ?>uploads/<?= $product['picture']; ?>"></dd>
                    </dl>
                    <dl class="row">
                        <dd class="col-md-9">Go to<a href="index.php">
                              List Items
                            </a></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>

</body>

</html>