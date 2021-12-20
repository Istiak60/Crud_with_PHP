<?php
$_id = $_GET['id'];
$webroot = "http://localhost/CRUD/admin/";
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM `banner` WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam('id', $_id);

$result = $stmt->execute();
$banner = $stmt->fetch();





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
                        <dt class="col-md-2">ID</dt>
                        <dd class="col-md-10"><?= $banner['id']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2">Name</dt>
                        <dd class="col-md-10"><?= $banner['title']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2">Link</dt>
                        <dd class="col-md-10"><?= $banner['link']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2">Pro Message</dt>
                        <dd class="col-md-10"><?= $banner['promotional_message']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2">HTML banner</dt>
                        <dd class="col-md-10"><?= $banner['html_banner']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Is Active</dt>
                        <dd class="col-md-9">
                            <?php

                            echo $banner['is_active'] ? 'Activated' : 'Deactivated';
                            ?>


                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Is Drafted</dt>
                        <dd class="col-md-9">
                            <?php

                            echo $banner['is_draft'] ? 'Drafted' : 'is not drafted';
                            ?>


                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Created At</dt>
                        <dd class="col-md-9"><?= $banner['created_at']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Modified At</dt>
                        <dd class="col-md-9"><?= $banner['modified_at']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2">Picture</dt>
                        <dd class="col-md-10"><img src="<?= $webroot; ?>uploads/<?= $banner['picture']; ?>"></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>

</body>

</html>