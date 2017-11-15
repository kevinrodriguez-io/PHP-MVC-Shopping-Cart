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

  /**
   * @param string $code Barcode
   * @param string $brand The brand of the article
   * @param string $description The description of the article
   * @param decimal $price The price of the article
   * @param int $quantity The quantity of available articles
   * @param int $id The unique, autoincremental identifier for this product
   */
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
  }

  /**
   * Fetches an article by the given id
   *
   * @param int $id Id of the article to get
   * @return Article The article with the corresponding id, otherwise null
   */
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

  /**
   * Fetches all the articles on the database
   *
   * @return array An array of articles
   */
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

  /**
   * Inserts the current article on the database
   *
   * @return void
   */
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

  /**
   * Updates this article (ID NEEDED) on the database
   *
   * @return void
   */
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

  /**
   * Removes this article on the database, 
   * doesn't delete this object
   *
   * @return void
   */
  public function Delete () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('DELETE FROM `articles` WHERE `ID` = ?');
    $statement->bind_param('i', $this->id);
    $statement->execute();
  }

}
?>