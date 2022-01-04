<?php
		include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
		use  Bitm\Banner;
		$data = $_POST;

		function is_empty($value) {
			if($value=='') {
				return true;
			}
			else {
				return false;
			}
		}

		if(is_empty($data['title'])) {
			session_start();
			$_SESSION['message'] = "Title can't be empty when you are editing.please enter a title";

			header('location:edit.php?id='.$data["id"]);
		}
		else {
			$_banner = new Banner();
			$banner = $_banner->update($data);
		}


?>