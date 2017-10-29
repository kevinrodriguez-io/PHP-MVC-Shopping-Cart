<?php
innclude_once('../model/user.class.php');
class security {
  
  const kUSERKEY = 'USER';

  public static function CreateSessionForUser ($user) {
    session_start();
    $_SESSION[kUSERKEY] = $user;
  }
  public static function UserIsLoggedIn () {
    session_start();
    return isset($_SESSION[kUSERKEY]);
  }
  public static function GetLoggedUser () {
    if (Security::UserIsLoggedIn()) {
      session_start();
      return $_SESSION[kUSERKEY];
    } else {
      return null;
    }
  }
  public static function DeleteSession () {
    session_start();
    session_destroy(); 
  }

}
?>