<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");

use  Bitm\Cart;
$_id =$_GET['id'];
$_cart = new Cart();
$_cart->delete($_id);





?>