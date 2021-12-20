<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
session_start();

$approot = $_SERVER['DOCUMENT_ROOT'] . '/CRUD/admin/';


if ($_FILES['picture']['name'] != "") {
    $filename = 'IMG_' . $_FILES['picture']['name'];
    $target = $_FILES['picture']['tmp_name'];
    $destination = $approot . 'uploads/' . $filename;
    $isFileMoved = move_uploaded_file($target, $destination);

    if ($isFileMoved) {
        $_picture = $filename;
    } else {
        $_picture = null;
    }
} else {
    $_picture = $_POST['old_picture'];
}
$_id = $_POST['id'];
$_product_id = $_POST['product_id'];
$_product_title = $_POST['product_title'];
$_qty = $_POST['qty'];
$_unit_price = $_POST['unit_price'];
$_total_price = ($_unit_price * $_qty);
//echo $_title;

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
$query = "UPDATE `cart` SET `product_id` = :product_id, 
                               `product_title` = :product_title, 
                               `picture` = :picture,
                               `qty` = :qty,
                               `unit_price` = :unit_price,
                               `total_price` = :total_price
          WHERE `cart`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':product_id', $_product_id);
$stmt->bindParam(':product_title', $_product_title);
$stmt->bindParam(':qty', $_qty);
$stmt->bindParam(':unit_price', $_unit_price);
$stmt->bindParam(':total_price', $_total_price);
$stmt->bindParam(':picture', $_picture);

$result = $stmt->execute();

//var_dump($result);

if ($result) {
    $_SESSION['message'] = "Cart is updated successfully";
} else {
    $_SESSION['message'] = "Cart is not updated";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");
