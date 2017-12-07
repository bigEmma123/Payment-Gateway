<?php
//Include configuration file
require_once("config.class.php");
class DB
{
  //Variable to store the connection instance
  public $connection;

public function __construct()
{
  $config=new Config;
  //echo $config->db_name;
  $this->connection=new mysqli($config->host,$config->db_user,$config->db_password,$config->db_name);
  if ($this->connection->connect_errno)
  {
    return false;
  }
  else return true;
}
//This function is used to select or retrieve into from the database
//The paramters are statement and parameter ,.the statement is the sql statement
public function select($statement)
{
  $result=$this->connection->query($statement);
  //echo $this->connection->error;
  return $result->fetch_array(MYSQLI_ASSOC);

}

//Retrieve all results.
public function all($statement)
{
  $result=$this->connection->query($statement);
  //echo $this->connection->error;
  return $result->fetch_all();
}
//This function is used to insert into from the database
public function insert($statement)
{
     $result=$this->connection->query($statement);
     //used to check to see if there were any errors when inserting data-
     //echo $this->connection->error;
     return (bool)$result;
}

//This function is used update into from the database
public function update($statement)
{
  $result=$this->connection->query($statement);
  $this->connection->error;
  return (bool)$result;
}

//This function is used to delete into from the database
public function delete($statement,$parameter)
{
  $result=$this->connection->query($statement);
  return (bool)$result;
}


}



?>
