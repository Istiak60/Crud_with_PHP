<?php
$_id =$_GET['id'];
$conn =new PDO("mysql:host=localhost;dbname=ecommerce",'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query="DELETE FROM `product` WHERE `product`.`id` = :id";
$stmt =$conn->prepare($query);
$stmt->bindParam('id',$_id);
$result =$stmt->execute();
if ($result){
    $_SESSION['message'] = "Admin is deleted successfully";
}else{
    $_SESSION['message'] = "Admin is not deleted";
}

// this is for the location set to store.php to main home page index.php
header("location:trash-index.php");

?>