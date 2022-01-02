<?php
namespace Bitm;
use PDO;
class Admin{

    public function __construct() {
		session_start();
		$this->conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
    
	public function index()
	{



$query = "SELECT * FROM `admin`";

$stmt = $conn->prepare($query);

$result = $stmt->execute();

$admins = $stmt->fetchAll();
return $admins;
	}

    public function show(){
        $_id = $_GET['id'];

        //Connect to database
        $conn = new PDO(
            "mysql:host=localhost;dbname=ecommerce",
            'root',
            ''
        );
        //set the PDO error mode to exception
        $conn->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        
        $query = "SELECT * FROM `admin` WHERE id = :id";
        
        $stmt = $conn->prepare($query);
        
        $stmt->bindParam(':id', $_id);
        
        $result = $stmt->execute();
        
        $admins = $stmt->fetch();
        return $admins;
        


    }
}