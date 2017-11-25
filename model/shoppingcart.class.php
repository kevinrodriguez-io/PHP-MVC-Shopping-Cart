<?php

class ShoppingCart {
  
  private $articles;
  public function getArticles () {
    return $this->articles;
  }

  public function __construct() {
    $this->articles = [];
  }

}

?>