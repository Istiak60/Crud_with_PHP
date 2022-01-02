<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");

use  Bitm\Banner;
$_banner = new Banner();
$banner = $_banner->store();
?>