<?php
$webroot = "http://localhost/CRUD/admin/";

$approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";
include_once($approot."vendor/autoload.php");
use  Bitm\Product;
$_product = new Product();
$product = $_product->store();

<<<<<<< HEAD
?>
=======

$_title = $_POST['title'];

if (array_key_exists('is_active', $_POST)) {
    $_is_active = $_POST['is_active'];
} else {
    $_is_active = 0;
}
if (array_key_exists('is_deleted', $_POST)) {
    $_is_deleted = $_POST['is_deleted'];
} else {
    $_is_deleted = 0;
}

$_created_at = date('Y-m-d h:i:s', time());

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `product` (`title`,`created_at`,`picture`,`is_active`,`is_deleted`) VALUES (:title,:created_at,:picture,:is_active,:is_deleted);";
$stmt = $conn->prepare($query);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':picture', $_picture);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':is_deleted', $_is_deleted);
$stmt->bindParam(':created_at', $_created_at);
$result = $stmt->execute();
if ($result) {
    $_SESSION['message'] = "Product is added successfully";
} else {
    $_SESSION['message'] = "Product is not added";
}
var_dump($result);
header("location:index.php");
>>>>>>> aa39485a082eac71f09b1d83f54402e4563602d4
