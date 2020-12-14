<?php
    // $con=mysqli_connect("localhost","root","","rest_api") or die("connection failed");
class Database{
        
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database='rest_api';


    public function connection(){
        
        try {
            $dsn="mysql:host={$this->servername};dbname={$this->database}";
            // $options= array(PDO::ATTR_PERSISTENT);            
            $conn=new PDO($dsn, $this->username, $this->password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } 
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }
    
}

?>