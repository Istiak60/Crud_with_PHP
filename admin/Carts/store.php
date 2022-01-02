<?php


// session_start();

$approot = $_SERVER['DOCUMENT_ROOT'] . '/CRUD/admin/';
$filename = 'IMG_' . $_FILES['picture']['name'];
$target = $_FILES['picture']['tmp_name'];
$destination = $approot . 'uploads/' . $filename;
$isFileMoved = move_uploaded_file($target, $destination);

if ($isFileMoved) {
    $_picture = $filename;
} else {
    $_picture = null;
}

$_product_id = $_POST['product_id'];
$_product_title = $_POST['product_title'];
$_qty = $_POST['qty'];
$_unit_price = $_POST['unit_price'];
$_total_price = ($_unit_price * $_qty);


//Connect to database
$conn = new PDO(
    "mysql:host=localhost;dbname=ecommerce",
    'root',
    ''
);
//set the PDO error mode to exception
$conn->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
$query = "INSERT INTO `cart` (`product_id`,`product_title`,`qty`,`picture`,`unit_price`,`total_price`) 
          VALUES (:product_id, :product_title, :qty, :picture,:unit_price,:total_price);";

$stmt = $conn->prepare($query);
$stmt->bindParam(':product_id', $_product_id);
$stmt->bindParam(':product_title', $_product_title);
$stmt->bindParam(':qty', $_qty);
$stmt->bindParam(':total_price', $_total_price);
$stmt->bindParam(':unit_price', $_unit_price);
$stmt->bindParam(':picture', $_picture);

$result = $stmt->execute();




if ($result) {
    $_SESSION['message'] = "Cart is added successfully";
} else {
    $_SESSION['message'] = "Cart is not added";
}
var_dump($result);
// this is for the location set to store.php to main home page index.php
header("location:index.php");
