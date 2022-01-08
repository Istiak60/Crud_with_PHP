<?php
		include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
		use  Bitm\User;
		$data = $_POST;

		function is_empty($value) {
			if($value=='') {
				return true;
			}
			else {
				return false;
			}
		}

		if(is_empty($data['user_name'])) {
			$_SESSION['message'] = "User Name can't be empty.please enter a title";
		
			header('location:create.php');
		}
		else {
			$_user = new User();
			$user = $_user->store($data);
		}

		
?>