<?php
namespace Bitm;
use PDO;
class Banner{
	public function __construct(){
		session_start();
		$this->conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public function index()
	{	
		
		$query = "SELECT * FROM `banner`";
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
	
		$query = "SELECT * FROM `banner` WHERE id = :id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam('id', $id);

		$result = $stmt->execute();
		$banners = $stmt->fetch();
		return $banners;
	}

	public function store($data)
	{
			$_picture=$this->upload();
			$_title = $data['title'];
			$_link = $data['link'];
			$_html_banner = $_data['html_banner'];
			$_promotional_message = $_data['promotional_message'];
			if (array_key_exists('is_active', $data)) {
			    $_is_active = $data['is_active'];
			} else {
			    $_is_active = 0;
			}
			if (array_key_exists('is_draft', $data)) {
			    $_is_draft = $data['is_draft'];
			} else {
			    $_is_draft = 0;
			}



			
			$query = "INSERT INTO `banner` (`title`,`link`,`promotional_message`,`html_banner`,`picture`,`is_active`,`is_draft`) VALUES (:title,:link,:promotional_message,:html_banner,:picture,:is_active,:is_draft);";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':title', $_title);
			$stmt->bindParam(':link', $_link);
			$stmt->bindParam(':promotional_message', $_promotional_message);
			$stmt->bindParam(':html_banner', $_html_banner);
			$stmt->bindParam(':picture', $_picture);
			$stmt->bindParam(':is_active', $_is_active);
			$stmt->bindParam(':is_draft', $_is_draft);


			$result = $stmt->execute();
			if ($result) {
			    $_SESSION['message'] = "Banner is added successfully";
			} else {
			    $_SESSION['message'] = "Banner is not added";
			}

			header("location:index.php");
			return $result;

	}
	public function edit($id)
	{
			
			$query = "SELECT * FROM `banner` WHERE id = :id";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam('id', $id);
			$result = $stmt->execute();
			$banner = $stmt->fetch();
			return $banner;
	}
	public function update($data)
	{
			$_picture=$this->upload();
			$_id = $data['id'];
			$_title = $data['title'];
			$_link = $data['link'];
			$_html_banner = $data['html_banner'];
			$_promotional_message = $data['promotional_message'];

			if (array_key_exists('is_active', $data)) {
				$_is_active = $data['is_active'];
			} else {
				$_is_active = 0;
			}
			
			if (array_key_exists('is_draft', $data)) {
				$_is_draft = $data['is_draft'];
			} else {
				$_is_draft = 0;
			}
			
			$_modified_at = date('Y-m-d h:i:s', time());
			
		
			$query = "UPDATE `banner`  SET `title`=:title, `link`=:link, `promotional_message`=:promotional_message,`html_banner`=:html_banner,`picture`=:picture,`is_active`=:is_active,`is_draft`=:is_draft,`modified_at`=:modified_at WHERE `banner`.`id` =:id;";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':title', $_title);
			$stmt->bindParam(':id', $_id);
			$stmt->bindParam(':link', $_link);
			$stmt->bindParam(':html_banner', $_html_banner);
			$stmt->bindParam(':promotional_message', $_promotional_message);
			$stmt->bindParam(':picture', $_picture);
			$stmt->bindParam(':is_active', $_is_active);
			$stmt->bindParam(':is_draft', $_is_draft);
			
			$stmt->bindParam(':modified_at', $_modified_at);
			$result = $stmt->execute();
			
			header("location:index.php");
			return $result;
		
	}
	public function delete($id)
	{
	
		
		$query="DELETE FROM `banner` WHERE `banner`.`id` = :id";
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

	
}