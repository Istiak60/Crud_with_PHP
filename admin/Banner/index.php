<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");

use  Bitm\Banner;
$_banner =new Banner();
$banners = $_banner->index();

 

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
                    <div class="fs-3 text-success">
                        <?php
                        echo $_SESSION['message'];
                        $_SESSION['message'] = "";
                        ?>
                    </div>
                    <h1 class="text-center mb-4">Banners</h1>
                    <ul class="nav justify-content-center fs-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="create.php">
                                Add an Banners
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
                                            <!-- <th scope="col">Last</th>
      <th scope="col">Handle</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($banners) > 0) :
                                            foreach ($banners as $banner) :



                                        ?>
                                                <tr>
                                                    <td><?= $banner['title']; ?></td>
                                                    <td><?= $banner['is_active'] ? 'Activated' : 'Deactivated' ?></td>





                                                    <td><a href="show.php?id=<?= $banner['id']; ?>">Show </a> | <a href="edit.php?id=<?= $banner['id']; ?>">Edit </a> | <a href="delete.php?id=<?= $banner['id']; ?>" onclick="return confirm('Are you sure you want to delete?')">
                                                            Delete
                                                        </a> </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                        else :
                                            ?>
                                            <tr>
                                                <td colspan="2">No Product is available.
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