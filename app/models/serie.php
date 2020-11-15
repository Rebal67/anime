<?php
class Serie extends BaseModel{
  public function __construct()
  {
    parent::__construct();
    $this->pk = 'serieid';
    $this->table = 'series';
    $this->columns = [
      'name' => '',
      'description' => '',
      'year' => '',
      'serieid' => '',
      'created_date' => '',
      'status' => '',
      'rating' => '',
      'thumbnail'=>''
    ];
  

  }
}