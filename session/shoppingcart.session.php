<?php
class ShoppingCartSession {
  
  const kShoppingCartSessionKey = 'SHOPPINGCART';

  public static function StoreShoppingCartInSession ($shoppingCart) {
    if (!isset($_SESSION)) { session_start(); }
    $_SESSION[ShoppingCartSession::kShoppingCartSessionKey] = $shoppingCart;
  }

  public static function ShoppingCartExists () {
    if (!isset($_SESSION)) { session_start(); }
    return isset($_SESSION[ShoppingCartSession::kShoppingCartSessionKey]);
  }

  public static function GetShoppingCart () {
    if (ShoppingCartSession::ShoppingCartExists()) {
      if (!isset($_SESSION)) { session_start(); }
      return $_SESSION[ShoppingCartSession::kShoppingCartSessionKey];
    } else {
      return null;
    }
  }

  public static function RemoveShoppingCartFromSession () {
    if (ShoppingCartSession::ShoppingCartExists()) {
      if (!isset($_SESSION)) { session_start(); }
      if (isset($_SESSION[ShoppingCartSession::kShoppingCartSessionKey])) {
        unset($_SESSION[ShoppingCartSession::kShoppingCartSessionKey]);
      }
    }
  }

}
?>