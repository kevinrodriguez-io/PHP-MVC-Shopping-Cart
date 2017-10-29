<?php
class Security {
  
  const kUSERKEY = 'USER';

  public static function CreateSessionForUser ($user) {
    session_start();
    $_SESSION[Security::kUSERKEY] = $user;
  }
  public static function UserIsLoggedIn () {
    session_start();
    return isset($_SESSION[Security::kUSERKEY]);
  }
  public static function GetLoggedUser () {
    if (Security::UserIsLoggedIn()) {
      session_start();
      return $_SESSION[Security::kUSERKEY];
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