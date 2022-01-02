<?php
	namespace Bitm;
	use PDO;

	class Product {

		public function __construct(){
			session_start();
			$this->conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		public function index() {
			
			$query = "SELECT * FROM `product`";
			$stmt = $this->conn->prepare($query);
			$result = $stmt->execute();
			$products = $stmt->fetchAll();

			return $products;
		}

		public function show(){
			$_id = $_GET['id'];
			$query = "SELECT * FROM `product` WHERE id = :id";
			$stmt =$this->conn->prepare($query);
			$stmt->bindParam('id', $_id);
			$result = $stmt->execute();
			$product = $stmt->fetch();
			
			return $product;
		}

		public function store() {
			$_picture=$this->upload();
			$_title = $_POST['title'];

			if (array_key_exists('is_active', $_POST)) {
			    $_is_active = $_POST['is_active'];
			} else {
			    $_is_active = 0;
			}
			if (array_key_exists('is_deleted', $_POST)) {
			    $_is_deleted = $_POST['is_deleted'];
			} else {
			    $_is_deleted = 0;
			}

			$_created_at = date('Y-m-d h:i:s', time());
			$query = "INSERT INTO `product` (`title`,`created_at`,`picture`,`is_active`,`is_deleted`) VALUES (:title,:created_at,:picture,:is_active,:is_deleted);";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':title', $_title);
			$stmt->bindParam(':picture', $_picture);
			$stmt->bindParam(':is_active', $_is_active);
			$stmt->bindParam(':is_deleted', $_is_deleted);
			$stmt->bindParam(':created_at', $_created_at);
			$result = $stmt->execute();
			
			if ($result) {
			    $_SESSION['message'] = "Product is added successfully";
			} else {
			    $_SESSION['message'] = "Product is not added";
			}

			
			header("location:index.php");
			return $result;

	    }

		public function edit() {
			$_id = $_GET['id'];
			$query = "SELECT * FROM `product` WHERE id = :id";
			$stmt =$this->conn->prepare($query);
			$stmt->bindParam('id', $_id);
			$result = $stmt->execute();
			$product = $stmt->fetch();
			
			return $product;
		}

		public function update() {
		
			$_picture=$this->upload();
			$_id = $_POST['id'];
			$_title = $_POST['title'];
			if (array_key_exists('is_active', $_POST)) {
			    $_is_active = $_POST['is_active'];
			} else {
			    $_is_active = 0;
			}
			if (array_key_exists('is_deleted', $_POST)) {
			    $_is_deleted = $_POST['is_deleted'];
			} else {
			    $_is_deleted = 0;
			}
			$_modified_at = date('Y-m-d h:i:s', time());
			$query = "UPDATE `product`  SET `title`=:title,`picture`=:picture ,`is_active`=:is_active,`modified_at`=:modified_at,`is_deleted`=:is_deleted WHERE `product`.`id` =:id;";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':title', $_title);
			$stmt->bindParam(':id', $_id);
			$stmt->bindParam(':is_active', $_is_active);
			$stmt->bindParam(':is_deleted', $_is_deleted);
			$stmt->bindParam(':picture', $_picture);
			$stmt->bindParam(':modified_at', $_modified_at);
			$result = $stmt->execute();
			
			header("location:index.php");
			return $result;


		}

		public function delete() {
			$_id =$_GET['id'];
			$query="DELETE FROM `product` WHERE `product`.`id` = :id";
			$stmt =$this->conn->prepare($query);
			$stmt->bindParam('id',$_id);
			$result =$stmt->execute();
			if ($result){
			    $_SESSION['message'] = "Admin is deleted successfully";
			}else{
			    $_SESSION['message'] = "Admin is not deleted";
			}

			header("location:trash-index.php");
			
			return $result;
		}

		public function trash() {
			$_id = $_GET['id'];
			$_is_deleted = 1;
			$query = "UPDATE `product`  SET `is_deleted`=:is_deleted WHERE `product`.`id` =:id;";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam('id', $_id);
			$stmt->bindParam('is_deleted',$_is_deleted);
			$result =$stmt->execute();
			if ($result){
			    $_SESSION['message'] = "Product is Trashed successfully";
			}else{
			    $_SESSION['message'] = "Product is not Trashed";
			}

			// this is for the location set to store.php to main home page index.php
			header("location:index.php");

			return $result;

		}

		public function trash_show() {
			$query = "SELECT * FROM `product` where is_deleted =1";
			$stmt = $this->conn->prepare($query);
			$result = $stmt->execute();
			$products = $stmt->fetchAll();

			return $products;
		}
		
		public function restore() {
			$_id = $_GET['id'];
			$_is_deleted = 0;
			$query = "UPDATE `product`  SET `is_deleted`=:is_deleted WHERE `product`.`id` =:id;";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam('id', $_id);
			$stmt->bindParam('is_deleted', $_is_deleted);
			$result = $stmt->execute();
			if ($result){
				$_SESSION['message'] = "Product is Restored successfully";
			}else{
				$_SESSION['message'] = "Product is not Restored";
			}
			
			header("location:index.php");
			return $result;
		}

		private function upload() {

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
	}
?>