<?php
class User
{
  private $database;
  public function __construct()
  {
    $this->database = new Database;
  }


  // Find user by email
  public function checkUserExists($email)
  {
    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE email = :email";
    $this->database->prepare($query);
    $this->database->bind(":email", $email);
    $row = $this->database->getRow();
    // Check the rowcount
    if ($this->database->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  // Register user
  public function register($data)
  {
    $query = "INSERT INTO users (name, email, password) ";
    $query .= "VALUES(:name, :email, :password)";
    $this->database->prepare($query);
    $this->database->bind(":name", $data['name']);
    $this->database->bind(":email", $data['email']);
    $this->database->bind(":password", $data['password']);
    if ($this->database->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Find user by email
  public function login($email, $password)
  {
    $query = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE email = :email ";
    $query .= "AND password = :password ";
    $this->database->prepare($query);
    $this->database->bind(":email", $email);
    $this->database->bind(":password", $password);
    return $this->database->getRow();
  }
}
