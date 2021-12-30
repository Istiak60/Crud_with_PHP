<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 12/21/2021
 * Time: 12:13 PM
 */

$webroot = "http://localhost/CRUD/admin/";


$approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";
include_once($approot."vendor/autoload.php");
use  Bitm\Product;
$_product = new Product();
$_product->trash();
?>

=======
<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 12/21/2021
 * Time: 12:13 PM
 */

$_id =$_GET['id'];
$_is_deleted =1;
$conn =new PDO("mysql:host=localhost;dbname=ecommerce",'root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = "UPDATE `product`  SET `is_deleted`=:is_deleted WHERE `product`.`id` =:id;";
$stmt =$conn->prepare($query);
$stmt->bindParam('id',$_id);
$stmt->bindParam('is_deleted',$_is_deleted);
$result =$stmt->execute();
if ($result){
    $_SESSION['message'] = "Product is Trashed successfully";
}else{
    $_SESSION['message'] = "Product is not Trashed";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");

?>
>>>>>>> aa39485a082eac71f09b1d83f54402e4563602d4
