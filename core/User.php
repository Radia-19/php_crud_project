<?php 

include 'Database.php';

class User extends Database
{
    public function register($username,$email,$password)
    {
    	$sql = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";//query
    	$this->exec($sql);
    }
    public function checkPreviousUser($username,$email)
    {
        $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        return $this->fetch($sql);
    }
   
    public function checkOneUser($username,$password)
    {
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        return $this->fetch($sql);
    }   
}
?>