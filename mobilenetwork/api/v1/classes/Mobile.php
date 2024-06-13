<?php 
require_once "Db.php";

class Mobile extends Db{

    private $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }

    public function register_network($mobile_number, $mobile_network, $mobile_message, $ref_code){

        $sql = "INSERT INTO mobile(mobile_number, mobile_network, mobile_message, ref_code)VALUES(?,?,?,?)";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([$mobile_number, $mobile_network, $mobile_message, $ref_code]);

        $result = $this->connection->lastInsertid();
        return $result;
    }
}




?>