<?php
class Admin extends Controller{


  function __construct(){
    
  }


  function index(){
    isModerator();
    $this->view('admin/index');
  }

}




?>