<?php
class Admin extends Controller{


  function __construct(){
    
  }


  function index(){
    isModerator();
    $this->view('admin/index');
  }

  function upload(){
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $this->view('admin/upload');
      $ffmpeg = FFMpeg\FFMpeg::create();







      
    }elseif($_SERVER['REQUEST_METHOD']=='POST'){

    };
  }

}




?>