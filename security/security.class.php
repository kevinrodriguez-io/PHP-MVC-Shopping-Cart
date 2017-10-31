<?php
class Security {
  
  const kUserKey = 'USER';

  public static function CreateSessionForUser ($user) {
    session_start();
    $_SESSION[Security::kUserKey] = $user;
  }

  public static function UserIsLoggedIn () {
    session_start();
    return isset($_SESSION[Security::kUserKey]);
  }

  public static function GetLoggedUser () {
    if (Security::UserIsLoggedIn()) {
      session_start();
      return $_SESSION[Security::kUserKey];
    } else {
      return null;
    }
  }
  
  public static function DeleteSession () {
    session_start();
    session_destroy(); 
  }

  public static function HashPassword ($password) {
    return password_hash($password, PASSWORD_DEFAULT);
  }

}
?>