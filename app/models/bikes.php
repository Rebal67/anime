<?php
class Bikes
{
  private $database;
  public function __construct()
  {
    $this->database = new Database;
  }
  // returns all countries
  public function getMinimalRadius($radius)
  {
    $query = "SELECT * ";
    $query .= "FROM bikes ";
    $query .= "WHERE radius > :radius ";
    $this->database->prepare($query);
    $this->database->bind(":radius", $radius);
    return $this->database->getArray();
  }

  public function getAll(){
    $query = "SELECT * ";
    $query .= "FROM bikes ";
    $this->database->prepare($query);
    return $this->database->getArray();
  }

  public function getOne($id){
    $query = "SELECT * ";
    $query .= "FROM bikes ";
    $query .= "WHERE id = :id ";
    $this->database->prepare($query);
    $this->database->bind(":id", $id);
    return $this->database->getRow();
  }
  public function addBike($name,$radius){
    $query = "insert into bikes (name,radius) VALUES ";
    $query .= "(:name, :radius )";
    $this->database->prepare($query);
    $this->database->bind(":radius", $radius);
    $this->database->bind(":name", $name);
    return $this->database->execute();
  }
  public function delete($id){
    $query = "Delete from bikes ";
    $query .= "Where id = :id limit 1";
    $this->database->prepare($query);
    $this->database->bind(":id", $id);
    return $this->database->execute();
  }
  public function update($id,$name,$radius){
    $query = "Update bikes ";
    $query .= "set name = :name,radius = :radius  ";
    $query .= "WHERE id = :id ";
    $this->database->prepare($query);
    $this->database->bind(":radius", $radius);
    $this->database->bind(":name", $name);
    $this->database->bind(":id", $id);
    return $this->database->execute();
  }
}

