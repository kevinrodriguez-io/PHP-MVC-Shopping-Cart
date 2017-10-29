<?php
class DataBase {
  
  private $hostname;
  private $database;
  private $username;
  private $password;

  public function __construct(
    $hostname= 'localhost',
    $database= 'awsrv',
    $username= 'AWSRV',
    $password= 'sanpedro123!'
  ) {
    $this->hostname = $hostname;
    $this->database= $database;
    $this->username= $username;
    $this->password= $password;
  }

  public function CreateConnection() {
    $db = new mysqli($this->hostname, $this->username, $this->password, $this->database);
    if($db->connect_error){
      throw new Exception('Falló la conexión ('.$db->connect_errno.')');
    }
    return $db;
  }

}
?>