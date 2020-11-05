<?php
class Database
{
  private $dbaseHandler; // dbase handler
  private $statementHandler; // statement
  private $error; // error message

  function __construct()
  {
    try {
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
      $this->dbaseHandler = new PDO($dsn, DBUSER, DBPASS, $options);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }
  public function prepare($query)
  {
    $this->statementHandler = $this->dbaseHandler->prepare($query);
  }


  // Bind the param
  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) { // Check that function returns true
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }
    $this->statementHandler->bindValue($param, $value, $type);
  }

  public function execute()
  {
    return $this->statementHandler->execute();
  }

  // Get single row as object
  public function getRow()
  {
    $this->execute();
    return $this->statementHandler->fetch(PDO::FETCH_OBJ);
  }

  // Get results in an array
  public function getArray()
  {
    $this->execute();
    return $this->statementHandler->fetchAll(PDO::FETCH_OBJ);
  }

  // Get row count
  public function rowCount()
  {
    return $this->statementHandler->rowCount();
  }
}
