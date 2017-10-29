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
    $BD = new mysqli($hostname,$username,$contrasenia,$database);
    if($BD->connect_error){
      throw new Exception('Falló la conexión ('.$BD->connect_errno.')');
    }
    return $BD;
  }

}
?>