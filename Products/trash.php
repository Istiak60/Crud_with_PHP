<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 12/21/2021
 * Time: 12:13 PM
 */

include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use  Bitm\Product;
$_product = new Product();
$_product->trash();
?>

