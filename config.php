<?php

if(session_status() == PHP_SESSION_NONE){
	session_start();
}

$approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";
$webroot = "http://localhost/CRUD/admin/";
include_once($approot."vendor/autoload.php");


?>