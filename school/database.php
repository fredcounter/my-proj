<?php
 
 class Database{

    private $host ='localhost';  
    private $database ='school';
    private $username ='root';
    private $pw ='12345';

    protected $connection;

    function connect(){
  
    try {
        $this->connection = new PDO(
            "mysql:host=$this->host;dbname=$this->database",
            $this->username,
            $this->pw
          );
          echo "Connection successful!";
          exit();A
    } catch (PDOExeption $th) {
        echo "error" . $th -> getMessage();
    }
    return $this->connection;
}
 }


 $db = new Database();
 $db->connect();
?>