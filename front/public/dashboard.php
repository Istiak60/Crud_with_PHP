<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
?>
<!doctype html>
<html lang="en">
<?php
include_once('../views/elements/head.php');

?>
<body>
<?php
echo $_SESSION['user_id'];
include_once('../views/elements/header.php');

include_once('../views/elements/navbar.php');
include_once('../views/elements/carousel.php');
include_once('../views/elements/best-sellers.php');
include_once('../views/elements/special-products.php');
include_once('../views/elements/special-products.php');
include_once('../views/elements/script.php');
include_once('../views/elements/footer.php');



?>











</body>
</html>