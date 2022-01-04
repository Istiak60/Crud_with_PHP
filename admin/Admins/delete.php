<?php

include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use  Bitm\Admin;
$_id =$_GET['id'];
$_admin = new Admin();
$_admin->delete($_id);


?>