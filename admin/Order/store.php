<?php

$_product_id= $_POST['product_id'];
$_qty = $_POST['qty'];


$conn =new PDO("mysql:host=localhost;dbname=ecommerce",'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query= "INSERT INTO `orders` (`product_id`,`qty`) VALUES (:product_id,:qty);";
$stmt = $conn->prepare($query);

$result=$stmt->execute(array(
    ':product_id' => $_product_id,
    ':qty' => $_qty,
    
));



var_dump($result);


?>