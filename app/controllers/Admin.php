<?php
class Admin extends Controller{


  function __construct(){
    $this->serieModel = $this->model("Serie");
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
        $data = [
          "name"=>"",
          "rating"=> "",
          "seriestatus"=>"",
          "year"=>"",
          "description"=>"",
          "file"=> "",
          "name_error"=>"",
          "rating_row"=> "",
          "seriestatus_error"=>"",
          "year_error"=>"",
          "description_error"=>"",
          "file_error"=>""
        ];
        $this->view('admin/uploadserie');
      }
   

      
      





    }elseif($_SERVER['REQUEST_METHOD']=='POST'){
      if($uploadStatus == 'serie'){
        $this->serieUpload();
      }
      if($uploadStatus == 'film'){
        $this->filmUpload();
      }


    };
  }

  function filmUpload(){

  }


  function serieUpload(){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $_FILES = filter_var_array($_FILES);
    $data = [
      "name"=>trim($_POST['name']),
      "rating"=> trim($_POST['rating']),
      "seriestatus"=>trim($_POST['seriestatus']),
      "year"=>trim($_POST['year']),
      "description"=>trim($_POST['description']),
      "file"=> $_FILES['file'],
      "name_error"=>"",
      "rating_row"=> "",
      "seriestatus_error"=>"",
      "year_error"=>"",
      "description_error"=>"",
      "file_error"=>""
    ];

    if(empty($data['name'])){
      $data['name_error'] = "name is required";
    }


    if(empty($data['rating'])){
      $data['rating_error'] = "rating is required";
    }

    if($data['rating'] < 0 || $data['rating'] > 5){
      $data['rating_error'] = "rating is must be between 0 and 5";
    }

    if(empty($data['seriestatus'])){
      $data['seriestatus_error'] = "seriestatus is required";
    }
    if(empty($data['year'])){
      $data['year_error'] = "year is required";
    }
    if(empty($data['description'])){
      $data['description_error'] = "description is required";
    }
    if(empty($data['file'])){
      $data['file_error'] = "file is required";
    }



    if(
      empty($data['name_error']) &&
      empty($data['rating_error']) &&
      empty($data['seriestatus_error']) &&
      empty($data['year_error']) &&
      empty($data['description_error']) &&
      empty($data['file_error']) 
    ){
      $uploadOK=true;
      $serie = $this->serieModel->readFirst([
        "WHERE name = :name",
        ["name"=> $data['name']]
        ]);

      if($serie){
        $data['name_error'] = "this serie already exists";
        $uploadOK = false;
      }
    
       if(!mkdir(UPLOADPLACE.$data['name'])){
        $uploadOK = false;
       }

    //    if($imageFileType != "jpg" && 
    //    $imageFileType != "png" && 
    //    $imageFileType != "jpeg"
    //   && $imageFileType != "gif" ) {
 
    //   $uploadOk = 0;
    // }
    
    }else{
      var_dump($data);
      $this->view('admin/uploadserie',$data);
    }
  }

}
