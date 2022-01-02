<?php
$conn =new PDO("mysql:host=localhost;dbname=ecommerce",'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query="SELECT * FROM `orders`";
$stmt =$conn->prepare($query);
$result =$stmt->execute();
$orders = $stmt->fetchAll();
echo"<pre>";
// print_r($products);
echo"</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>List of Order</title>
</head>
<body>
    

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                    <h1 class ="text-center mb-4"> List  of Order</h1>
                    <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Product_id</th>
      <th scope="col">Quantity</th>
      <th scope="col">Action</th>
     
      <!-- <th scope="col">Last</th>
      <th scope="col">Handle</th> -->
    </tr>
  </thead>
  <tbody>
      <?php
      foreach($orders as $order):
      
      
      
      ?>
    <tr>
      <td><?= $order['product_id'];?></td>
      <td><?= $order['qty'];?></td>
      



      <td><a href="show.php?id=<?=$order['id'];?>">Show </a> | <a href="edit.php?id=<?=$order['id'];?>">Edit </a> | <a href="delete.php?id=<?=$order['id'];?>">Delete </a> </td>
    </tr>
    <?php
    endforeach;
    ?>
  </tbody>
</table>
            </div>
        </div>
    </div>
</section>

</body>
</html>