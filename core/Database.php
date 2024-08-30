<?php 

class Database
{
	public $conn;

	public function __construct()
	{
		$host = "localhost";
		$dbUser = "root";
		$dbPass = "";
		$dbName = "php_crud_project";

		try {
		  $this->conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass);
		  //echo "connected successfully!";
		}catch(PDOException $e) {
		  echo "Connection failed: " . $e->getMessage();
		}
	}

	public function exec($sql)
	{
		$statement = $this->conn->prepare($sql);
    	$statement->execute();
	}

	public function fetch($sql)
	{
		$statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
	}
	
}

//$db = new Database();

?>