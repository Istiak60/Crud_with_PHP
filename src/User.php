<?php
namespace Bitm;
use PDO;
class User{
	public function __construct(){
		
		$this->conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public function index()
	{	
		
		$query = "SELECT * FROM `users`";
		$stmt = $this->conn->prepare($query);
		$result = $stmt->execute();
		$users = $stmt->fetchAll();

		return $users;

		echo "<pre>";
		// print_r($products);
		echo "</pre>";


	}
	public function getActiveBanners()
	{	$starting_point = 0;
		$end = 3;
		
		$query = "SELECT * FROM `banner` where is_active = 1 LIMIT $starting_point, $end";
		$stmt = $this->conn->prepare($query);
		$result = $stmt->execute();
		$banners = $stmt->fetchAll();

		return $banners;

		echo "<pre>";
		// print_r($products);
		echo "</pre>";


	}

	public function show($id)
	{
		$webroot = "http://localhost/CRUD/admin/";
	
		$query = "SELECT * FROM `users` WHERE id = :id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam('id', $id);

		$result = $stmt->execute();
		$users = $stmt->fetch();
		return $users;
	}

	public function store($data)
	{		 $_id = $data['id'];
			// $_picture=$this->upload();
			$_full_name = $data['full_name'];
			$_user_name = $data['user_name'];
			$_password = $data['password'];
			$_email = $data['email'];
			$_phone_number = $data['phone_number'];
			
			$_created_at = date('Y-m-d h:i:s',time());
			
			if (array_key_exists('is_delete',$data)) {
			    $_is_delete = $data['is_delete'];
			} else {
			    $_is_delete = 0;
			}
	
			$query = "INSERT INTO `users` 
			(`full_name`,`user_name`,`password`,`email`,`picture`,`phone_number`,`created_at`,`is_delete`) 
			VALUES 
			(:full_name,:user_name,:password,:email,:picture,:phone_number,:created_at,:is_delete);";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':full_name', $_full_name);
			$stmt->bindParam(':user_name', $_user_name);
			$stmt->bindParam(':password', $_password);
			$stmt->bindParam(':email', $_email);
			$stmt->bindParam(':picture', $_picture);
			$stmt->bindParam(':phone_number', $_phone_number);
			$stmt->bindParam(':is_delete', $_is_delete);
			$stmt->bindParam(':created_at', $_created_at);

			
			$result = $stmt->execute();
			//var_dump($result);
			if ($result) {
			    $_SESSION['message'] = "User is added successfully";
			} else {
			    $_SESSION['message'] = "User is not added";
			}

			header("location:../../front/public/login.php");
			return $result;

	}
	public function edit($id)
	{
			
			$query = "SELECT * FROM `users` WHERE id = :id";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam('id', $id);
			$result = $stmt->execute();
			$user = $stmt->fetch();
			return $user;
	}
	public function update($data)
	{	$_id =$data['id'];
		$_picture=$this->upload();
		$_full_name = $data['full_name'];
		$_user_name = $data['user_name'];
		$_password = $data['password'];
		$_email = $data['email'];
		$_phone_number = $data['phone_number'];	
		if (array_key_exists('is_delete',$data)) {
			$_is_delete = $data['is_delete'];
		} else {
			$_is_delete = 0;
		}
			
			$_modified_at = date('Y-m-d h:i:s', time());
			
		
			// $query = "UPDATE `users`  SET `full_name`= , `user_name`= :user_name, `password`= , `email`=, `picture`= ,`is_delete`= , `phone_number`= ,`modified_at`= :modified_at WHERE ";
			$query = "UPDATE `users` SET `full_name`= :full_name,`user_name` = :user_name,`email` = :email,`password`= :password,`picture`= :picture,`phone_number`= :phone_number,`modified_at` = :modified_at,`is_delete` = :is_delete WHERE `users`.`id` = :id;";
			
			
			
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':id', $_id);
			$stmt->bindParam(':full_name', $_full_name);
			$stmt->bindParam(':user_name', $_user_name);
			$stmt->bindParam(':password', $_password);
			$stmt->bindParam(':email', $_email);
			$stmt->bindParam(':picture', $_picture);
			$stmt->bindParam(':phone_number', $_phone_number);
			$stmt->bindParam(':is_delete', $_is_delete);
			$stmt->bindParam(':modified_at', $_modified_at);
			
			$result = $stmt->execute();
			//var_dump($result);
			if ($result) {
			    $_SESSION['message'] = " updated successfully";
			} else {
			    $_SESSION['message'] = "Update fail";
			}

			header("location:index.php");
			return $result;
		
	}
	public function delete($id)
	{
	
		
		$query="DELETE FROM `users` WHERE `users`.`id` = :id";
		$stmt =$this->conn->prepare($query);
		$stmt->bindParam('id',$id);
		$result =$stmt->execute();
		var_dump($result);
		header("location:index.php");
		return $result;
	}
	private function upload()
	{

		$approot = $_SERVER['DOCUMENT_ROOT'] . '/CRUD/admin/';
		$_picture=null;
		if ($_FILES['picture']['name'] != "") {
		$filename='IMG_'.time().'_'.$_FILES['picture']['name'];
		$target = $_FILES['picture']['tmp_name'];
		$destination = $approot . 'uploads/' .$filename;
		$isFileMoved = move_uploaded_file($target, $destination);

		if ($isFileMoved) {
			$_picture = $filename;
		} 
		}else{
			if($_POST['old_picture'])
			{
				$_picture = $_POST['old_picture'];
			}
		}
		return $_picture;
	}

	// public function login($data)
	// {	
	// 	$email = $data['email'];
	// 	$password = $data['password'];
		 
	// 	$query = "SELECT * FROM `users` WHERE email = :email";
	// 	$stmt = $this->conn->prepare($query);
	// 	$stmt->bindParam('email', $email);
	// 	if($result = $stmt->execute()){
	// 		$user = $stmt->fetch();
	// 		if(($user->password)==$password){
	// 			$_SESSION['id'] = $user->id;
	// 			$_SESSION['email'] = $user->email;

	// 			header("location:../../front/public/index.php");
	// 		}
	// 	}
	// 	return $user;

	// 	$query="SELECT FROM `users` WHERE `id`=:id";
	// 	$stmt =$this->conn->prepare($query);
	// 	$stmt->bindParam(':id',$id);
	// 	// $stmt->bindParam(':email',$email);
	// 	// $stmt->bindParam(':password',$password);
	// 	$result =$stmt->execute();
	// 	var_dump($result);
	// 	header("location:index.php");
	// 	return $result;



	// }
	public function login($email, $password){
		$query = "SELECT COUNT(*) AS total FROM `users` WHERE email LIKE :email AND password LIKE :password;";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$result = $stmt->execute();
		$totalfound = $stmt->fetch();
		if($totalfound['total'] > 0){
			$_SESSION['is_authenticated']=true;
			header("location:http://localhost/CRUD/front/public/index.php");
		}else{
			$_SESSION['is_authenticated']=false;
			header("location:http://localhost/CRUD/404.php");
		}
}

	
}