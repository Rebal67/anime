<?php
class Admin extends Controller{


  function __construct(){
    
  }


  function indexAction(){
    isModerator();
    $this->view('admin/index');
  }

  function uploadAction($uploadStatus){
    $ffmpeg = FFMpeg\FFMpeg::create([
      'ffmpeg.binaries'  => 'C:/ffmpeg/bin/ffmpeg.exe', // the path to the FFMpeg binary
      'ffprobe.binaries' => 'C:/ffmpeg/bin/ffprobe.exe', // the path to the FFProbe binary
      'timeout'          => 3600, // the timeout for the underlying process
      'ffmpeg.threads'   => 12,   // the number of threads that FFMpeg should use
    ]);
    if($_SERVER['REQUEST_METHOD']=='GET'){
      if($uploadStatus == 'film'){

        $this->view('admin/uploadfilm');
      }


      if($uploadStatus == 'serie'){

        $this->view('admin/uploadserie');
      }
   

      
      





    }elseif($_SERVER['REQUEST_METHOD']=='POST'){

    };
  }

  function filmUpload(){

  }

}




?>