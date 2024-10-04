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
		}catch(PDOException $e) {
		  echo "Connection failed: " . $e->getMessage();
		}
	}

	public function exec($query, $params = [])
	{
	    try {
	        $stmt = $this->pdo->prepare($query);
	        $stmt->execute($params);  // Bind parameters properly
	        return true;
	    } catch (PDOException $e) {
	        echo 'Error: ' . $e->getMessage();
	        return false;
	    }
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