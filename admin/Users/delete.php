<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");

use  Bitm\User;
$_id =$_GET['id'];
$_user= new User();
$_user->delete($_id);

?>


