<?php
class vwSale {

  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }

  private $userID;
  public function getUserID () { return $this->userID; }
  private function setUserID ($userID) { $this->userID = $userID; }

  private $username;
  public function getUsername () { return $this->username; }
  public function setUsername ($username) { $this->username = $username; }

  private $articleID;
  public function getArticleID () { return $this->articleID; }
  private function setArticleID ($articleID) { $this->articleID = $articleID; }

  private $code; 
  public function getCode () { return $this->code; }
  public function setCode ($code) { $this->code = $code; }

  private $brand; 
  public function getBrand () { return $this->brand; }
  public function setBrand ($brand) { $this->brand = $brand; }

  private $description; 
  public function getDescription () { return $this->description; }
  public function setDescription ($description) { $this->description = $description; }

  private $invoiceNumber;
  public function getInvoiceNumber () { return $this->invoiceNumber; }
  private function setInvoiceNumber ($invoiceNumber) { $this->invoiceNumber = $invoiceNumber; }

  private $saleDate;
  public function getSaleDate () { return $this->saleDate; }
  private function setSaleDate ($saleDate) { $this->saleDate = $saleDate; }

  public function __construct(
    $userID = 0,
    $username = '',
    $articleID = 0,
    $code = '',
    $brand = '',
    $description = '',
    $invoiceNumber = '',
    $saleDate = '',
    $id = null
  ) {
    $this->userID = $userID;
    $this->username = $username;
    $this->articleID = $articleID;
    $this->code = $code;
    $this->brand = $brand;
    $this->description = $description;
    $this->invoiceNumber = $invoiceNumber;
    $this->saleDate = $saleDate;
    $this->id = $id;
  }

  public static function GetSaleById ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERID`, `USERNAME`, `ARTICLEID`, `CODE`, `BRAND`, `DESCRIPTION` `INVOICENUMBER`, `SALEDATE`, `ID` FROM `vwsales` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    $statement->bind_result($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
      }
    }
    return $model;
  }

  public static function GetAllSales () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERID`, `USERNAME`, `ARTICLEID`, `CODE`, `BRAND`, `DESCRIPTION` `INVOICENUMBER`, `SALEDATE`, `ID` FROM `vwsales`');
    $statement->bind_result($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public static function GetAllSalesForUser ($userID) {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERID`, `USERNAME`, `ARTICLEID`, `CODE`, `BRAND`, `DESCRIPTION` `INVOICENUMBER`, `SALEDATE`, `ID` FROM `vwsales` WHERE `USERID` = ?');
    $statement->bind_param('i', $userID);
    $statement->bind_result($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public static function GetSaleByInvoiceNumber ($invoiceNumber) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERID`, `USERNAME`, `ARTICLEID`, `CODE`, `BRAND`, `DESCRIPTION` `INVOICENUMBER`, `SALEDATE`, `ID` FROM `vwsales` WHERE `INVOICENUMBER` = ?');
    $statement->bind_param('s', $invoiceNumber);
    $statement->bind_result($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
      }
    }
    return $model;
  }

  public static function FindSalesByInvoiceNumber ($invoiceNumber) {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERID`, `USERNAME`, `ARTICLEID`, `CODE`, `BRAND`, `DESCRIPTION` `INVOICENUMBER`, `SALEDATE`, `ID` FROM `vwsales` WHERE `INVOICENUMBER` LIKE ?');
    $statement->bind_param('s', $invoiceNumber);
    $statement->bind_result($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale($USERID, $USERNAME, $ARTICLEID, $CODE, $BRAND, $DESCRIPTION, $INVOICENUMBER, $SALEDATE, $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

}
?>