<?php
/*
** made by Rebal
** Date 19/06/2020
** description BASEMODEL voor database
*/
class BaseModel
{
  protected $pk; // primary key
  protected $columns = []; // table columns 
  protected $table;
  protected $database; // database connection 

  public function __construct()
  {
    $this->database = new Database;
  }

  public function __set($name, $value)
  {
    $this->columns[$name] = $value;
  }

  public function readAll($arr = [])
  {
    $query =  "select " . implode(',', array_keys($this->columns)) . " from " . $this->table . " ";

    if ($arr) {
      $query .=  $arr[0];
      $this->database->prepare($query);
      if (isset($arr[1])) {
        foreach ($arr[1] as $paraName => $value) {
          $this->database->bind($paraName, $value);
        }
      }
    } else {
      $this->database->prepare($query);
    }

    return $this->database->getRows();
  }



  public function readFirst($arr = [])
  {
    $query =  "select " . implode(',', array_keys($this->columns)) . " from " . $this->table . " ";

    if ($arr) {
      $query .=  $arr[0];
      $this->database->prepare($query);
      if (isset($arr[1])) {
        foreach ($arr[1] as $paraName => $value) {
          $this->database->bind($paraName, $value);
        }
      }
    } else {
      $this->database->prepare($query);
    }

    $row =  $this->database->getRow();
    if ($row) {
      $pk = $this->pk;

      foreach($row as $key=>$value){
        $this->columns[$key] = $value;
      } 

      return $row;
    } else {
      echo 'couldnt find result';
    }
  }


  public function readOne($arr = [])
  {
    $query =  "select " . implode(',', array_keys($this->columns)) . " from " . $this->table . " ";
    $query .= "WHERE ".$this->pk." = :pk";
    if ($arr) {
      $query .=  $arr[0];
      $this->database->prepare($query);
      $this->database->bind('pk',$this->columns[$this->pk]);
      if (isset($arr[1])) {
        foreach ($arr[1] as $paraName => $value) {
          $this->database->bind($paraName, $value);
        }
      }
    } else {
      $this->database->prepare($query);
    }

    $row =  $this->database->getRow();
    if ($row) {
      $pk = $this->pk;

      foreach($row as $key=>$value){
        $this->columns[$key] = $value;
      } 

      return $row;
    } else {
      return false;
    }
  }

  public function delete()
  {
    if ($this->pk) {
      $query = "DELETE From " . $this->table . " ";
      $query .= "WHERE " . $this->pk . ' = :pk limit 1';

      $this->database->prepare($query);
      $this->database->bind('pk', $this->columns[$this->pk]);
      return $this->database->execute();
    } else {
      echo $this->pk . " is empty";
    }
  }

  public function create()
  {
    $query  = "INSERT INTO " . $this->table . ' ';
    $sets = [];
    $keys = [];
    foreach ($this->columns as $key => $value) {
      if ($key != $this->pk) {
        $sets[] = ":$key";
        $keys[] = $key;
      }
    }
    $query .= "(" . implode(',', $keys) . ") ";
    $query .= "VALUES (" . implode(',', $sets) . ") ";
    $this->database->prepare($query);
    foreach ($this->columns as $key => $value) {
      if ($key != $this->pk) {
        $this->database->bind(":$key", $value);
      }
    }
    $result = $this->database->execute();
    $this->columns[$this->pk] = $this->database->getId();
    return $result;
  }

  public function save()
  {
    $query  = "Update " . $this->table . ' ';
    $query .= "SET ";
    $sets = [];
    foreach ($this->columns as $key => $value) {
      $sets[] = "$key = :$key";
    }

    $query .= implode(', ', $sets) . ' ';
    $query .= "WHERE " . $this->pk . ' = :pk';
    $this->database->prepare($query);

    foreach ($this->columns as $key => $value) {
      $this->database->bind(":$key", $value);
    }
    $this->database->bind('pk', $this->columns[$this->pk]);
    return $this->database->execute();
  }
}
