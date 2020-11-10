<?php
function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
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

function isAdmin(){
  if(!$_SESSION['userid'] > 1){
    redirect('users/login');
  }
}
function isModerator(){
  if(!$_SESSION['userid'] > 0){
    redirect('users/login');
  }
}

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
} 