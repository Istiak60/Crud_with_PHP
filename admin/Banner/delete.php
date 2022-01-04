<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");

use  Bitm\Banner;
$_id =$_GET['id'];
$_banner = new Banner();
$_banner->delete($_id);

?>


