<?php

$_id =$_POST['id'];

$_product_id= $_POST['product_id'];
$_qty = $_POST['qty'];
// echo $_title;
$conn =new PDO("mysql:host=localhost;dbname=ecommerce",'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query= "UPDATE `orders`  SET `product_id`=:product_id, `qty`=:qty  WHERE `orders`.`id` =:id;";
$stmt = $conn->prepare($query);
$stmt->bindParam(':product_id',$_product_id);
$stmt->bindParam(':id',$_id);
$stmt->bindParam(':qty',$_qty);
$result=$stmt->execute();
var_dump($result);


?>