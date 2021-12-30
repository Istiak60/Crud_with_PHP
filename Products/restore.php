<?php
$webroot = "http://localhost/CRUD/admin/";

$approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";
include_once($approot."vendor/autoload.php");
use  Bitm\Product;
$_product = new Product();
$product = $_product->restore();

?>