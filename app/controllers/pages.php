<?php
/*
** programmeurs zijn lui
**
*/
class Pages extends Controller
{


  public function index()
  {
    // $this->bikesModel = $this->model("Bikes");
    // // Minimal radius
    // $minimalRadius = 80;
    // // Read matching bikesfrom the database
    // $bikes = $this->bikesModel->getMinimalRadius($minimalRadius);
    $data = [
      "title" => "Welcome",
      "context" => 'bla bla bla'
    ];
    $this->view("pages/index", $data);
  }

  function contact()
  {
    authenticated();
    $data = [
      "title" => "Contact",
      "context" => 'bla bla bla'
    ];
    $this->view("pages/index", $data);
  }

  function about()
  {
    authenticated();
    $data = [
      "title" => "About me",
      "context" => 'bla bla bla'
    ];
    $this->view("pages/index", $data);
  }
}
