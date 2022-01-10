<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
    use  Bitm\Cart;
    $data = $_POST;
    function is_empty($value) {
        if($value=='') {
            return true;
        }
        else {
            return false;
        }
    }

    if(is_empty($data['product_title'])) {
        session_start();
        $_SESSION['message'] = "Title can't be empty.please enter a title";
    
        header('location:create.php');
    }
    else {
        $_cart = new Cart();
        $cart = $_cart ->store($data);
    }


?>