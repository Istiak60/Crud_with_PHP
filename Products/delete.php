<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use  Bitm\Product;
$_product = new Product();
$_product->delete();
?>