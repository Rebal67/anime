<?php
function encrypt($password)
{
  $salted = SALTHEADER . $password . SALTTRAILER;
  return hash('ripemd160', $salted);
}


// Simple page redirect
function redirect($page)
{
  header('location: ' . URLROOT . "/" . $page);
}


// flash massges
function flash($name, $message = "", $class = "alert alert-success")
{
  if (!empty($name)) {
    if (!empty($message)) {
      // If the message is filled, set the value
      $_SESSION[$name . "_message"] = $message;
      $_SESSION[$name . "_class"] = $class;
    } else {
      // No message passed, so display attemp
      if (!empty($_SESSION[$name . "_message"])) {
        $class = !empty($_SESSION[$name . "_class"]) ?
          $_SESSION[$name . "_class"] : "";
        echo "<div class=\"" . $class . " alert-dismissible fade show\" id=\"msgflash\" role=\"alert\">" . $_SESSION[$name . "_message"] ;
        echo<<<_END
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        _END;
        unset($_SESSION[$name . "_message"]);
        unset($_SESSION[$name . "_class"]);
      }
    }
  }
}


function authenticated(){
  if(!$_SESSION['userid']){
    redirect('users/login');
  }
}