<?php

class Projects extends Controller{
  private $bikesModel;
  function __construct()
  {
    $this->bikesModel = $this->model('Bikes');
  }
  function index(){

    $bikes  = $this->bikesModel->getAll();
    $data = [
      'bikes'=> $bikes
    ];
    $this->view('projects/index',$data);
  }
  function addbike(){
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

      $data = [
        'name'=> '',
        'radius'=> '',
        'name_error'=> '',
        'radius_error'=>''
      ];
      $this->view('projects/addbike',$data);
    }else{
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'name'=> trim($_POST['name']),
        'radius'=> (int)trim($_POST['radius']),
        'name_error'=> '',
        'radius_error'=>''
      ];

      if(empty($data['name'])){
        $data['name_error'] = 'please fill the name';
      }

      if(empty($data['radius'])){
        $data['radius_error'] = 'please fill the radius';
      }

      if(
        empty($data['name_error']) &&
        empty($data['radius_error'])
      ){
        $res = $this->bikesModel->addbike($data['name'],$data['radius']);
        if($res){
          flash('bikes','Bike has been added successfully');
        }else{
          flash('bikes','Could not Add Bike try Again later','alert alert-danger');
        }
        redirect('projects/index');
      }else{
        $this->view('projects/addbike',$data);
      }
    }
  }

  function delete($id){
    if($id){
     $res =  $this->bikesModel->delete($id);
     if($res){
      flash('bikes','Bike has been deleted successfully');
    }else{
      flash('bikes','Could not Delete Bike try Again later','alert alert-danger');
    }
    }
    
    redirect('projects/index');
    
  }

  function update($id){
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      $res = $this->bikesModel->getOne($id);
      if($res){
        $data = [
          'id'=>$id,
          'name'=> $res->name,
          'radius'=> $res->radius,
          'name_error'=> '',
          'radius_error'=>''
        ];
        $this->view('projects/editbike',$data);
      }else{
        redirect('projects/index');
      }
    
    }else{
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'id'=>(int)$id,
        'name'=> trim($_POST['name']),
        'radius'=> (int)trim($_POST['radius']),
        'name_error'=> '',
        'radius_error'=>''
      ];

      if(empty($data['name'])){
        $data['name_error'] = 'please fill the name';
      }

      if(empty($data['radius'])){
        $data['radius_error'] = 'please fill the radius';
      }

      if(
        empty($data['name_error']) &&
        empty($data['radius_error'])
      ){
        $res = $this->bikesModel->update($data['id'],$data['name'],$data['radius']);
        if($res){
          flash('bikes','Bike has been Updated successfully');
        }else{
          flash('bikes','Could not Update Bike try Again later','alert alert-danger');
        }
        redirect('projects/index');
      }else{
        $this->view('projects/editbike',$data);
      }
    }
  }
}