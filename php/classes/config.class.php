<?php
//This is the configuration file for the database
class config{

  public $db_name;
  public $db_password;
  public $db_table;
  public $db_user;
  public $host;

  public function __construct()
  {
    $this->db_host='localhost';
    $this->db_name='epay';  //epay
    $this->db_password='#gatewayDev2000';
    $this->db_user='gatewayDev'; //root

//returns the database object
    return $this;
  }
}



 ?>
