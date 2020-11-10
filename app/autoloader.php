<?php
require_once "config/config.php";
require_once '../vendor/autoload.php';
if(file_exists("config/costume_config.php"))require_once "config/costume_config.php";
require_once 'libraries/BaseModel.php';
require_once 'libraries/Controller.php';
require_once 'libraries/core.php';
require_once 'libraries/Database.php';

// Autoload core libraries
// spl_autoload_register(function($class){
//   require_once "libraries/".$class.".php";
//   });


?>