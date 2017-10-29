<?php
include_once('../database/database.class.php');
class User {

  private $username;
  private $password;

  public function __construct($username, $password) {
    $this->username = $username;
    $this->password = $password;
  }

  public function Login() {
    
    $db = new DataBase();
    $sql = 'SELECT COUNT(*) FROM `USERS` WHERE `USERNAME`=? AND `PASSWORD`=?';
    $statement = $db->prepare($sql);
    $parameters = array($username, $password);

    $count = 0;

    if ($statement->execute($parameters)) {
      while ($row = $statement->fetch()) {
        $count = (int)$row[0];
      }
    }

    return $count > 0;

  }

}
?>