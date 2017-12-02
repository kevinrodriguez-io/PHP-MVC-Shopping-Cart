<?php
class Article {

  /* Mapped */
  
  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }

  private $code; 
  public function getCode () { return $this->code; }
  public function setCode ($code) { $this->code = $code; }

  private $brand; 
  public function getBrand () { return $this->brand; }
  public function setBrand ($brand) { $this->brand = $brand; }

  private $description; 
  public function getDescription () { return $this->description; }
  public function setDescription ($description) { $this->description = $description; }

  private $price; 
  public function getPrice () { return $this->price; }
  public function setPrice ($price) { $this->price = $price; }

  private $quantity; 
  public function getQuantity () { return $this->quantity; }
  public function setQuantity ($quantity) { $this->quantity = $quantity; }

  /* No-mapped */

  private $cartUniqueId;
  public function getCartUniqueId () { return $this->cartUniqueId; }
  public function setCartUniqueId ($cartUniqueId) { $this->cartUniqueId = $cartUniqueId; }

  public function __construct(
    $code = '',
    $brand = '',
    $description = '',
    $price = 0.0,
    $quantity = 0,
    $id = null
  ) {
    $this->code = $code;
    $this->brand = $brand;
    $this->description = $description;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->id = $id;
    
    $this->cartUniqueId = uniqid('CART_');
  }

  public static function GetArticleById ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `CODE`, `BRAND`, `DESCRIPTION`, `PRICE`, `QUANTITY`, `ID` FROM `articles` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    $statement->bind_result($CODE, $BRAND, $DESCRIPTION, $PRICE, $QUANTITY, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Article($CODE, $BRAND, $DESCRIPTION, $PRICE, $QUANTITY, $ID);
      }
    }
    return $model;
  }

  public static function GetAllArticles () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `CODE`, `BRAND`, `DESCRIPTION`, `PRICE`, `QUANTITY`, `ID` FROM `articles`');
    $statement->bind_result($CODE, $BRAND, $DESCRIPTION, $PRICE, $QUANTITY, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Article($CODE, $BRAND, $DESCRIPTION, $PRICE, $QUANTITY, $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('INSERT INTO `articles`(`CODE`, `BRAND`, `DESCRIPTION`, `PRICE`, `QUANTITY`) VALUES (?, ?, ?, ?, ?)');
    $statement->bind_param(
      'sssdi',
      $this->code,
      $this->brand,
      $this->description,
      $this->price,
      $this->quantity
    );
    $statement->execute();
  }

  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'UPDATE `articles` SET 
        `CODE` = ?,
        `BRAND` = ?,
        `DESCRIPTION` = ?,
        `PRICE` = ?,
        `QUANTITY` = ? 
      WHERE `ID` = ?'
    );
    $statement->bind_param(
      'sssdii',
      $this->code,
      $this->brand,
      $this->description,
      $this->price,
      $this->quantity,
      $this->id
    );
    $statement->execute();
  }

  public function Delete () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('DELETE FROM `articles` WHERE `ID` = ?');
    $statement->bind_param('i', $this->id);
    $statement->execute();
  }

  

}
?>