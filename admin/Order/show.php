<?php
$_id =$_GET['id'];
$conn =new PDO("mysql:host=localhost;dbname=ecommerce",'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query="SELECT * FROM `orders` WHERE id = :id";
$stmt =$conn->prepare($query);
$stmt->bindParam('id',$_id);

$result =$stmt->execute();
$order = $stmt->fetch();



// echo "<pre>";
// print_r($product);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Show orders</title>
</head>
<body>
    

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                    <h1 class ="text-center mb-4">Order  Details </h1>
                    
                    <dl class="row">
                       <dt class="col-md-2">ID</dt>
                        <dd class="col-md-10"><?=$order['id'];?></dd>
                    </dl>
                    <dl class="row">
                       <dt class="col-md-2">PRoduct_ID</dt>
                        <dd class="col-md-10"><?=$order['product_id'];?></dd>
                    </dl>
                    <dl class="row">
                       <dt class="col-md-2">Quantity</dt>
                        <dd class="col-md-10"><?=$order['qty'];?></dd>
                    </dl>
                  
            </div>
        </div>
    </div>
</section>

</body>
</html>