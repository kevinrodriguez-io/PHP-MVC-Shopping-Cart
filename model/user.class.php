<?php
class User {

  /* Mapped */
  
  private $idCard; 
  public function getIdCard () { return $this->idCard; }
  public function setIdCard ($idCard) { $this->idCard = $idCard; }

  private $name; 
  public function getName () { return $this->name; }
  public function setName ($name) { $this->name = $name; }

  private $lastName; 
  public function getLastName () { return $this->lastName; }
  public function setLastName ($lastName) { $this->lastName = $lastName; }

  private $phone; 
  public function getPhone () { return $this->phone; }
  public function setPhone ($phone) { $this->phone = $phone; }

  private $email; 
  public function getEmail () { return $this->email; }
  public function setEmail ($email) { $this->email = $email; }

  private $username;
  public function getUsername () { return $this->username; }
  public function setUsername ($username) { $this->username = $username; }

  private $password;
  public function getPassword () { return $this->password; }
  public function setPassword ($password) { $this->password = $password; }

  private $role;
  public function getRole () { return $this->role; }
  public function setRole ($role) { $this->role = $role; }

  /* Not mapped */
  private $message;
  public function getMessage () { return $this->message; }
  public function setMessage ($message) { $this->message = $message; }

  public function __construct(
    $username,
    $password,
    $idCard = '',
    $name = '',
    $lastName = '',
    $phone = '',
    $email = '',
    $role = ''
  ) {
    $this->idCard = $idCard;
    $this->name = $name;
    $this->lastName = $lastName;
    $this->phone = $phone;
    $this->email = $email;
    $this->username = $username;
    $this->password = $password;
    $this->role = $role;
  }

  public function Login() {
    
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT COUNT(*) FROM `USERS` WHERE `USERNAME` = ? AND `PASSWORD` = ?');
    $statement->bind_param('ss', $this->getUsername(), Security::HashPassword($this->getPassword()));

    $count = 0;

    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $count = (int)$row[0];
      }
    }

    return $count > 0;

  }

  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'INSERT INTO `users` 
      (
        `IDCARD`, 
        `NAME`, 
        `LASTNAME`, 
        `PHONE`, 
        `EMAIL`, 
        `USERNAME`, 
        `PASSWORD`, 
        `ROLE`
      ) 
      VALUES 
      (
        ?, 
        ?, 
        ?, 
        ?, 
        ?, 
        ?, 
        ?, 
        ?
      )'
    );
    $statement->bind_param(
      'ssssssss',
      $this->getIdCard(),
      $this->getName(),
      $this->getLastName(),
      $this->getPhone(),
      $this->getEmail(),
      $this->getUsername(),
      Security::HashPassword($this->getPassword()),
      $this->getRole()
    );
    $statement->execute();
  }

  public function Edit () {
    // Implement
  }
}
?>