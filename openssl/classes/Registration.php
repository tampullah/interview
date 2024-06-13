<?php 
require_once "Db.php";
class Registration extends Db {

    private $connection;

    public function __construct()
    {
      $this->connection = $this->connect();
    }

    public function register_user($name, $email, $phone){

        $sql = "INSERT INTO customer (cust_name, cust_email, cust_phone)VALUES(?,?,?)";

        $stmt =$this->connection->prepare($sql);

        $stmt->execute([$name, $email, $phone]);

        $result = $this->connection->lastInsertId();

        return $result;

    }
}


?>