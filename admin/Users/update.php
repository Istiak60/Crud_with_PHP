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

		if(is_empty($data['full_name'])) {
			session_start();
			$_SESSION['message'] = "Full Name can't be empty when you are editing.please enter a title";

			header('location:edit.php?id='.$data['id']);
		}
		else {
			$_user = new User();
			$user = $_user->update($data);
		}


?>