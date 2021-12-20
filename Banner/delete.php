<?php
$_id =$_GET['id'];
$conn =new PDO("mysql:host=localhost;dbname=ecommerce",'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query="DELETE FROM `banner` WHERE `banner`.`id` = :id";
$stmt =$conn->prepare($query);
$stmt->bindParam('id',$_id);
$result =$stmt->execute();
var_dump($result);
header("location:index.php");
