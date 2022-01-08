<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Create</title>
</head>

<body>


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                <div class="fs-4 text-danger">
                        <?php
                        
                        echo $_SESSION['message'];
                        $_SESSION['message'] = "";
                        ?>
                    </div>
                    <h1 class="text-center mb-4"> Add New User </h1>

                    <form method="post" action="store.php" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="inputId" class="col-md-3 col-form-label">


                            </label>
                            <div class="col-md-9">
                                <input type="hidden" class="form-control" id="inputId" name="id" value="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputId" class="col-md-3 col-form-label">

                                Full Name:
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="inputFullName" name="full_name" value="">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputId" class="col-md-3 col-form-label">

                                User Name:
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="inputUserName" name="user_name" value="">
                            </div>
                        </div>

                       

                        <div class="mb-3 row">
                            <label for="inputId" class="col-md-3 col-form-label">

                                Email:
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="inputEmail" name="email" value="">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="inputId" class="col-md-3 col-form-label">
                                Password:
                            </label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="inputPassword" name="password" value="">
                            </div>
                        </div>

                        <!-- <div class="mb-3 row">
                            <label for="inputFile" class="col-md-3 col-form-label">

                                Picture:
                            </label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" id="inputFile" name="picture" value="">
                            </div>
                        </div> -->

                        <div class="mb-3 row">
                            <label for="inputId" class="col-md-3 col-form-label">

                                Phone Number:
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="inputPhoneNumber" name="phone_number" value="">
                            </div>
                        </div>

                   
                        <div class="mb-3 row form-check">
                            <div class="col-md-9">
                                <input type="checkbox" class="form-check-input" id="inputIsDelete" name="is_delete" value="0">
                            </div>
                            <label for="inputIsActive" class="col-md-3  form-check-label">

                                Is Delete:
                            </label>

                        </div>


                




                        <div class="mb-3 row">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Submit</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>