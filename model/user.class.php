<?php
class User {

  /* Mapped */
  
  private $id;
  public function getId () { return $this->$id; }
  private function setId ($id) { $this->id = $id; }

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

  /**
   * Creates a user with the given parameters
   *
   * @param string $username
   * @param string $password
   * @param string $idCard
   * @param string $name
   * @param string $lastName
   * @param string $phone
   * @param string $email
   * @param string $role
   * @param int $id
   */
  public function __construct(
    $username,
    $password,
    $idCard = '',
    $name = '',
    $lastName = '',
    $phone = '',
    $email = '',
    $role = '',
    $id = null
  ) {
    $this->idCard = $idCard;
    $this->name = $name;
    $this->lastName = $lastName;
    $this->phone = $phone;
    $this->email = $email;
    $this->username = $username;
    $this->password = $password;
    $this->role = $role;
    $this->id = $id;
  }

  public function Login() {
    
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT COUNT(*) FROM `USERS` WHERE `USERNAME` = ? AND `PASSWORD` = ?');
    $pwd = Security::HashPassword($this->getPassword());
    $statement->bind_param('ss', $this->username, $pwd);

    $count = 0;

    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $count = (int)$row[0];
      }
    }

    return $count > 0;

  }

  /**
   * Fetches a user by the given id
   *
   * @param int $id Id of the user to get
   * @return User The user with the corresponding id, otherwise null
   */
  public static function GetUserById ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERNAME`, `PASSWORD`, `IDCARD`, `NAME`, `LASTNAME`, `PHONE`, `EMAIL`, `ROLE`, `ID` FROM `users` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new User($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
      }
    }
    return $model;
  }

  /**
   * Fetches all the users on the database
   *
   * @return array An array of users
   */
  public static function GetAllUsers () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERNAME`, `PASSWORD`, `IDCARD`, `NAME`, `LASTNAME`, `PHONE`, `EMAIL`, `ROLE`, `ID` FROM `users`');
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new User($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
        array_push($models, $model);
      }
    }
    return $models;
  }

  /**
   * Inserts the current user on the database
   *
   * @return void
   */
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
    $pwd = Security::HashPassword($this->password);
    $statement->bind_param(
      'ssssssss',
      $this->idCard,
      $this->name,
      $this->lastName,
      $this->phone,
      $this->email,
      $this->username,
      $pwd,
      $this->role
    );
    $statement->execute();
  }

  /**
   * Updates this user (ID NEEDED) on the database
   *
   * @return void
   */
  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'UPDATE `users` 
      SET 
        `IDCARD`=?,
        `NAME`=?,
        `LASTNAME`=?,
        `PHONE`=?,
        `EMAIL`=?,
        `USERNAME`=?,
        `PASSWORD`=?,
        `ROLE`=? 
      WHERE `ID`=?'
    );
    $pwd = Security::HashPassword($this->password);
    $statement->bind_param(
      'ssssssssi',
      $this->idCard,
      $this->name,
      $this->lastName,
      $this->phone,
      $this->email,
      $this->username,
      $pwd,
      $this->role,
      $this->id
    );
    $statement->execute();
  }

  /**
   * Removes this user on the database, 
   * doesn't delete this object
   *
   * @return void
   */
  public function Delete () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('DELETE FROM `users` WHERE `ID` = ?');
    $statement->bind_param('i', $this->id);
    $statement->execute();
  }

}
?>