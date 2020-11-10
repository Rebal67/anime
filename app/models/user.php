<?php
class User extends BaseModel
{


  // private $database;
  public function __construct()
  {
    parent::__construct();
    $this->pk = 'userid';
    $this->table = 'users';
    $this->columns = [
      'first_name' => '',
      'last_name' => '',
      'email' => '',
      'userid' => '',
      'password' => '',
      'salt' => '',
      'level' => '',
      'ip'=>''
    ];
  

  }


  // Find user by email
  public function checkUserExists($email)
  {
    $query = "SELECT email ";
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
    $ip = getUserIP();
    $query = "INSERT INTO users (first_name,last_name, email, password,salt,level,ip) ";
    $query .= "VALUES(:name,:lastname, :email, :password,:salt,0,:ip)";
    $this->database->prepare($query);
    $this->database->bind(":name", $data['name']);
    $this->database->bind(":email", $data['email']);
    $this->database->bind(":lastname", $data['last_name']);
    $this->database->bind(":salt", $data['salt']);
    $this->database->bind(":password", $data['password']);
    $this->database->bind(":ip",$ip);
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
