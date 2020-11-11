<?php

class Users extends Controller
{

  public function __construct()
  {
    $this->userModel = $this->model("User");
  }
  // Called for loading and post requests
  // Called for register flow,
  // GET=prepare and POST=process data
  public function registerAction()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

      // Prepare registration form
      $data = [
        "name" => "",
        "last_name"=> "",
        "email" => "",
        "password" => "",
        "confirmpassword" => "",
        "name_error" => "",
        "last_name_error" => "",
        "email_error" => "",
        "password_error" => "",
        "confirmpassword_error" => ""
      ];
      // Load view
      $this->view("users/register", $data);
    } else {
      // Process registration data-target

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Load the form data
      $data = [
        "name" => trim($_POST['name']),
        "last_name" => trim($_POST['last_name']),
        "email" => trim($_POST['email']),
        "password" => trim($_POST['password']),
        "confirmpassword" => trim($_POST['confirmpassword']),
        "name_error" => "",
        "last_name_error" => "",
        "email_error" => "",
        "password_error" => "",
        "confirmpassword_error" => ""
      ];
      // Validate
      if (empty($data['name'])) {
        $data['name_error'] = "Geef uw  voornaam in";
      }
      if (empty($data['last_name'])) {
        $data['last_name_error'] = "Geef uw achternaam in";
      }

      if (empty($data['email'])) {
        $data['email_error'] = "Geef het email adres in";
      } else {
        // Check existing email
        if ($this->userModel->checkUserExists($data['email'])) {
          $data['email_error'] = "Email adres is al in gebruik";
        }
      }

      if (empty($data['password'])) {
        $data['password_error'] = "Geef het wachtwoord in";
      } elseif (strlen($data['password']) < 6) {
        $data['password_error'] = "Het wachtwoord moet minstens 6 tekens lang zijn";
      }

      if (empty($data['confirmpassword'])) {
        $data['confirmpassword_error'] = "Herhaal aub het wachtwoord";
      } elseif (strlen($data['password']) < 6) {
        $data['confirmpassword_error'] = "Het herhaalde wachtwoord moet minstens 6 tekens lang zijn";
      } elseif ($data['password'] != $data['confirmpassword']) {
        $data['confirmpassword_error'] = "De wachtwoorden komen niet overeen";
      }

      // Check of no errors have been found
      if ((empty($data['name_error'])) &&
        (empty($data['last_name_error'])) &&
        (empty($data['email_error'])) &&
        (empty($data['password_error'])) &&
        (empty($data['confirmpassword_error']))
      ) {
        // Encrypt password
        $salt = generateRandomString(25);
        $data['salt'] = $salt;
        $data['password'] = password_hash($data['password'].$salt,PASSWORD_DEFAULT);
        // Register user
        if ($this->userModel->register($data)) {
          flash(
            "register_success",
            "Registratie gelukt, u kunt nu inloggen"
          );
          redirect("/users/login");
        } else {
          die("Registratie is niet gelukt");
        }
      } else {
        // Load view to display errors
        $this->view("users/register", $data);
      }
    }
  }

  // Handle login
  public function loginAction()
  {
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

      // Prepare registration form
      $data = [
        "email" => "",
        "password" => "",
        "name_error" => "",
        "email_error" => "",
        "password_error" => "",
        "confirmpassword_error" => ""
      ];
      // Load view
      $this->view("users/login", $data);
    } else {
      // Process registration data-target

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Load the form data
      $data = [
        "email" => trim($_POST['email']),
        "password" => trim($_POST['password']),
        "email_error" => "",
        "password_error" => "",

      ];
      if(empty($data['email'])) $data['email_error'] = "email is required";
      if(empty($data['password'])) $data['password_error'] = "password is required";
      // Check of errors have been found
      if ((empty($data['email_error'])) &&
        (empty($data['password_error']))
      ) {
        // Encrypt password
        $user = $this->userModel->readFirst([
          'where email = :email',
          ['email' => $data['email']]
        ]);
        if(!$user){
          $data["email_error"] =
            "Email/wachtwoord combinatie is niet correct";
          $data["password_error"] =
            "Email/wachtwoord combinatie is niet correct";
          $this->view("users/login", $data);
          exit;
        }
  
        $loggedInUser = password_verify($data['password'].$user->salt,$user->password);
        // Check and set logged in user
        // When okay, the row is returned, otherwise false
        // $loggedInUser = $this->userModel->login(
        //   $data["email"],
        //   $data["password"]
        // );
        if ($loggedInUser) {
          // Login okay, store in session
          $_SESSION["userid"] = $user->userid;
          $_SESSION["useremail"] = $user->email;
          $_SESSION["username"] = $user->name;
          $_SESSION['level'] = $user->level;
          redirect("pages/index");
        } else {
          $data["email_error"] =
            "Email/wachtwoord combinatie is niet correct";
          $data["password_error"] =
            "Email/wachtwoord combinatie is niet correct";
          $this->view("users/login", $data);
        }
      } else {
        // Load view with errors
        $this->view("users/login", $data);
      }
    }
  }
  // Handle logout
  public function logoutAction()
  {
    unset($_SESSION["userid"]);
    unset($_SESSION["useremail"]);
    unset($_SESSION["username"]);
    session_destroy();
    redirect("users/login");
  }
}
