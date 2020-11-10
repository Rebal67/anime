<?php
/*
** programmeurs zijn lui
**
*/
class Pages extends Controller
{


  public function indexAction()
  {

    // var_dump($ffMpeg );
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
