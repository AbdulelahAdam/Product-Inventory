<?php
class Database{
  private $host = "localhost";
  private $db_name = "id20466990_scandiweb_test";
  private $username = "id20466990_root";
  private $passowrd = "tfZcvFzBh)XA59q5";
  private $conn;



  public function connect(){
    $this->conn = NULL;

    try{
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->passowrd);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
      echo "Connection Error " . $e->getMessage();
    }

    return $this->conn;
  }

}