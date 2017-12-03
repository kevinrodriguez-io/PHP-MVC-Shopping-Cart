<?php
class Setting {

  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }

  private $sKey;
  public function getSKey () { return $this->sKey; }
  private function setSkey ($sKey) { $this->sKey = $sKey; }

  private $sValue;
  public function getSValue () { return $this->sValue; }
  private function setSvalue ($sValue) { $this->sValue = $sValue; }

  public function __construct($sKey, $sValue, $id = null) {
    $this->sKey = $sKey;
    $this->sValue = $sValue;
    $this->id = $id;
  }

  public static function GetSettingById ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT  `SKEY`, `SVALUE`, `ID` FROM `settings` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    $statement->bind_result($SKEY, $SVALUE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Setting($SKEY, $SVALUE, $ID);
      }
    }
    return $model;
  }

  public static function GetSettingByKey ($sKey) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT  `SKEY`, `SVALUE`, `ID` FROM `settings` WHERE `SKEY` = ?');
    $statement->bind_param('s', $sKey);
    $statement->bind_result($SKEY, $SVALUE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Setting($SKEY, $SVALUE, $ID);
      }
    }
    return $model;
  }

  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('UPDATE `settings` SET `SVALUE` = ? WHERE `ID` = ?');
    $statement->bind_param('si', $this->sValue, $this->id);
    $statement->execute();
  }

  // Other helper methods

  public static function GetLastInvoiceNumber() {
    return (int)(Setting::GetSettingByKey('LASTINVOICENUMBER'))->getSValue();
  }

  public static function IncrementLastInvoiceNumber () {
    $model = Setting::GetSettingByKey('LASTINVOICENUMBER');
    $model->setSValue(($model->getSValue()+1));
    $model->Edit();
  }

}
?>