<?php
namespace Bitm;
use PDO;
class Cart{
	public function __construct() {

		session_start();
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
    public function show()
    {
        $_id = $_GET['id'];

        $query = "SELECT * FROM `cart` WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $result = $stmt->execute();
        $cart = $stmt->fetch();
         return $cart;

    }
}