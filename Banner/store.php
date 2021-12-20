<?php
session_start();
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
$_link = $_POST['link'];
$_html_banner = $_POST['html_banner'];
$_promotional_message = $_POST['promotional_message'];
if (array_key_exists('is_active', $_POST)) {
    $_is_active = $_POST['is_active'];
} else {
    $_is_active = 0;
}
if (array_key_exists('is_draft', $_POST)) {
    $_is_draft = $_POST['is_draft'];
} else {
    $_is_draft = 0;
}



$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `banner` (`title`,`link`,`promotional_message`,`html_banner`,`picture`,`is_active`,`is_draft`) VALUES (:title,:link,:promotional_message,:html_banner,:picture,:is_active,:is_draft);";
$stmt = $conn->prepare($query);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':link', $_link);
$stmt->bindParam(':promotional_message', $_promotional_message);
$stmt->bindParam(':html_banner', $_html_banner);
$stmt->bindParam(':picture', $_picture);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':is_draft', $_is_draft);


$result = $stmt->execute();
if ($result) {
    $_SESSION['message'] = "Banner is added successfully";
} else {
    $_SESSION['message'] = "Banner is not added";
}
var_dump($result);
header("location:index.php");
