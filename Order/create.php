<?php






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Create order</title>
</head>
<body>
    

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                    <h1 class ="text-center mb-4"> Add New order </h1>
                        <form method ="post"action="store.php" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label for="inputId" class="col-md-3 col-form-label">

                                
                                </label>
                                    <div class="col-md-9">
                                        <input type="hidden" class="form-control" id="inputId" name="id" value="">
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputId" class="col-md-3 col-form-label">

                                Product_ID:
                                </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputProductid" name="product_id" value="">
                                    </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputId" class="col-md-3 col-form-label">

                                Quantity
                                </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputQty" name="qty" value="">
                                    </div>
                            </div>

                            <!-- <div class="mb-3 row">
                                <label for="inputId" class="col-md-3 col-form-label">

                                Promotional Message:
                                </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="inputPromotionalMessage" name="promotional_message" value="">
                                    </div>
                            </div> -->




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