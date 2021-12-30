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

