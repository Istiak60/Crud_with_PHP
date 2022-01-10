<?php
namespace Bitm;
use PDO;
class Cart{
	public function __construct() {

		// session_start();
		$this->conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
    
    public function index() {
        $query = "SELECT * FROM `cart`";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();
        $carts = $stmt->fetchAll();

        return $carts;
	}
    public function show($id)
    {
        


        $query = "SELECT * FROM `cart` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('id', $id);
        $result = $stmt->execute();
        $cart = $stmt->fetch();
         return $cart;

    }

    public function store ($data)    {
        


        $_picture=$this->upload();
        $_product_id = $data['product_id'];
        $_product_title = $data['product_title'];
        $_qty = $data['qty'];
        $_unit_price = $data['unit_price'];
        $_total_price = ($_unit_price * $_qty);


        $query = "INSERT INTO `cart` (`product_id`,`product_title`,`qty`,`picture`,`unit_price`,`total_price`) 
                  VALUES (:product_id, :product_title, :qty, :picture,:unit_price,:total_price);";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $_product_id);
        $stmt->bindParam(':product_title', $_product_title);
        $stmt->bindParam(':qty', $_qty);
        $stmt->bindParam(':total_price', $_total_price);
        $stmt->bindParam(':unit_price', $_unit_price);
        $stmt->bindParam(':picture', $_picture);

        $result = $stmt->execute();




        if ($result) {
            $_SESSION['message'] = "Cart is added successfully";
        } else {
            $_SESSION['message'] = "Cart is not added";
        }
        var_dump($result);
        // this is for the location set to store.php to main home page index.php
        header("location:index.php");



    }

    public function edit($id)
	{
			
			$query = "SELECT * FROM `cart` WHERE id = :id";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam('id', $id);
			$result = $stmt->execute();
			$cart = $stmt->fetch();
			return $cart;


	}

    public function update($data)    {
        $_picture=$this->upload();

        $_id = $data['id'];
        $_product_id = $data['product_id'];
        $_product_title = $data['product_title'];
        $_qty = $data['qty'];
        $_unit_price = $data['unit_price'];
        $_total_price = ($_unit_price * $_qty);
//echo $_title;

        $query = "UPDATE `cart` SET `product_id` = :product_id, 
                                       `product_title` = :product_title, 
                                       `picture` = :picture,
                                       `qty` = :qty,
                                       `unit_price` = :unit_price,
                                       `total_price` = :total_price
                  WHERE `cart`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':product_id', $_product_id);
        $stmt->bindParam(':product_title', $_product_title);
        $stmt->bindParam(':qty', $_qty);
        $stmt->bindParam(':unit_price', $_unit_price);
        $stmt->bindParam(':total_price', $_total_price);
        $stmt->bindParam(':picture', $_picture);
        
        $result = $stmt->execute();
        header("location:index.php");

        return $result;

    }
    public function delete($id)
	{
	
		
		$query="DELETE FROM `cart` WHERE `cart`.`id` = :id";
		$stmt =$this->conn->prepare($query);
		$stmt->bindParam('id',$id);
		$result =$stmt->execute();
		var_dump($result);
		header("location:index.php");
		return $result;

       
// this is for the location set to store.php to main home page index.php
header("location:index.php");


	}
    private function upload()    {

        $approot = $_SERVER['DOCUMENT_ROOT'] . '/CRUD/admin/';
        $filename = 'IMG_' . $_FILES['picture']['name'];
        $target = $_FILES['picture']['tmp_name'];
        $destination = $approot . 'uploads/' . $filename;
        $isFileMoved = move_uploaded_file($target, $destination);

        if ($isFileMoved) {
            $_picture = $filename;
        } else {
            $_picture = null;
        }

        return $_picture;
            }

}