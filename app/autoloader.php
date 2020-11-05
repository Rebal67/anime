<?php
require_once "config/config.php";
if(file_exists("config/costume_config.php"))require_once "config/costume_config.php";
// Autoload core libraries
spl_autoload_register(function($class){
  require_once "libraries/".$class.".php";
  });


?>