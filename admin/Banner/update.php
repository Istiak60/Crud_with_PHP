<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use  Bitm\Banner;
$_banner = new Banner();
$_banner->update();

?>