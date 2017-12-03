<?php
class Sale {

  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }

  private $userID;
  public function getUserID () { return $this->userID; }
  private function setUserID ($userID) { $this->userID = $userID; }

  private $articleID;
  public function getArticleID () { return $this->articleID; }
  private function setArticleID ($articleID) { $this->articleID = $articleID; }

  private $invoiceNumber;
  public function getInvoiceNumber () { return $this->invoiceNumber; }
  private function setInvoiceNumber ($invoiceNumber) { $this->invoiceNumber = $invoiceNumber; }

  private $saleDate;
  public function getSaleDate () { return $this->saleDate; }
  private function setSaleDate ($saleDate) { $this->saleDate = $saleDate; }

  public function __construct(
    $userID,
    $articleID,
    $invoiceNumber = '',
    $saleDate = '',
    $id = null
  ) {
    $this->userID = $userID;
    $this->articleID = $articleID;
    $this->invoiceNumber = $invoiceNumber;
    $this->saleDate = $saleDate;
    $this->id = $id;
  }

  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('INSERT INTO `sales`(`USERID`, `ARTICLEID`, `INVOICENUMBER`, `SALEDATE`) VALUES (?, ?, ?, ?)');
    $statement->bind_param(
      'iiss',
      $this->userID,
      $this->articleID,
      $this->invoiceNumber,
      $this->saleDate
    );
    $statement->execute();

    Setting::IncrementLastInvoiceNumber();

    $article = Article::GetArticleById($this->articleID);
    $article->setQuantity($article->getQuantity()-1);
    $article->Edit();

  }

  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'UPDATE `sales` SET 
        `USERID` = ?,
        `ARTICLEID` = ?,
        `INVOICENUMBER`= ?,
        `SALEDATE` = ?
      WHERE `ID` = ?'
    );
    $statement->bind_param(
      'iissi',
      $this->userID,
      $this->articleID,
      $this->invoiceNumber,
      $this->saleDate,
      $this->id
    );
    $statement->execute();
  }

  public function Delete () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('DELETE FROM `sales` WHERE `ID` = ?');
    $statement->bind_param('i', $this->id);
    $statement->execute();
  }

}
?>