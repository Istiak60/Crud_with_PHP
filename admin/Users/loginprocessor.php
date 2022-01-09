<?php

include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use Bitm\User;

$email = $_POST['email'];
$password = $_POST['password'];

function is_empty($value){
    if($value == ''){
        return true;
    }else{
        return false;
    }
}

if(empty($email) || empty($password)){
    session_start();
    $_SESSION['message'] = "User Name can't be empty.";
    header("location:".$webroot."front/public/signup.php");
}else{
    $_user = new User();
    $_user->login($email, $password);
}

?>



