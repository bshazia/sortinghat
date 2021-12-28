<?php

class Database {
  private  $hostname = "localhost";
  private  $username = "root";
  private  $password = "root";
  private  $database = "sorting_hat";
  public $conn;

  //constructor
  public function __construct(){
   $this->conn = $this->getConnection();

  }
  //methode
  private function getConnection(){
      $connection = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
    if($connection == false){
        echo  "no connection";
        die();
    }
    // else{
    //   echo "woooohooo";
    // }
    return $connection;
  }
//select query
  public function selectQuery($sql){
      return  mysqli_query($this->conn, $sql)->fetch_all(MYSQLI_ASSOC);
  }
//isert data query
  public function insertQuery($sql){
    return  mysqli_query($this->conn, $sql);

  }
  //update query
  public function updateQuery($sql){
    return  mysqli_query($this->conn, $sql);

  }
}