<?php
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


$_title = $_POST['title'];

if (array_key_exists('is_active', $_POST)) {
    $_is_active = $_POST['is_active'];
} else {
    $_is_active = 0;
}

$_created_at = date('Y-m-d h:i:s', time());

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `product` (`title`,`created_at`,`picture`,`is_active`) VALUES (:title,:created_at,:picture,:is_active);";
$stmt = $conn->prepare($query);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':picture', $_picture);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':created_at', $_created_at);
$result = $stmt->execute();
if ($result) {
    $_SESSION['message'] = "Product is added successfully";
} else {
    $_SESSION['message'] = "Product is not added";
}
var_dump($result);
header("location:index.php");
