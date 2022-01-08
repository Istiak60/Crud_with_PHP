<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use  Bitm\User;

$_id = $_GET['id'];
$_user = new User();
$user = $_user->show($_id);


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
                        <dd class="col-md-10"><?= $user['id']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2"> User Name</dt>
                        <dd class="col-md-10"><?= $user['user_name']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2">Full Name</dt>
                        <dd class="col-md-10"><?= $user['full_name']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2">Email</dt>
                        <dd class="col-md-10"><?= $user['email']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2">Phone Number</dt>
                        <dd class="col-md-10"><?= $user['phone_number']; ?></dd>
                    </dl>
             
                    <dl class="row">
                        <dt class="col-md-3">Is Drafted</dt>
                        <dd class="col-md-9">
                            <?php

                            echo $user['is_delete'] ? 'Deleted' : 'is not deleted';
                            ?>


                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Created At</dt>
                        <dd class="col-md-9"><?= $user['created_at']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-3">Modified At</dt>
                        <dd class="col-md-9"><?= $user['modified_at']; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-2">Picture</dt>
                        <dd class="col-md-10"><img src="<?= $webroot; ?>uploads/<?= $user['picture']; ?>"></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>

</body>

</html>