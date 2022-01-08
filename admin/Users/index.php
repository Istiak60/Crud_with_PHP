<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use  Bitm\User;
$_user =new User();
$users = $_user->index();
 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>List of banner</title>
</head>

<body>


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="fs-4 text-success">
                        <?php
                        echo $_SESSION['message'];
                        $_SESSION['message'] = "";
                        ?>
                    </div>
                    <h1 class="text-center mb-4">Users</h1>
                    <ul class="nav justify-content-center fs-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="create.php">
                                Add an Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-16">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Status</th>

                                            <th scope="col">Action</th>
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($users) > 0) :
                                            foreach ($users as $user) :



                                        ?>
                                                <tr>
                                                    <td><?= $user['user_name']; ?></td>

                                                    <td><a href="show.php?id=<?= $user['id']; ?>">Show </a> | <a href="edit.php?id=<?= $user['id']; ?>">Edit </a> | <a href="delete.php?id=<?= $user['id']; ?>" onclick="return confirm('Are you sure you want to delete?')">
                                                            Delete
                                                        </a> </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                        else :
                                            ?>
                                            <tr>
                                                <td colspan="2">No User is available.
                                                    <a href="create.php"> Click here to add one.</a>
                                                </td>
                                            </tr>
                                        <?php
                                        endif;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </section>

</body>

</html>