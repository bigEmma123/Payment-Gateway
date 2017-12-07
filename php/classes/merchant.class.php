<?php
require_once('db.class.php');

class Merchant{

private $db;
private $merchant_mail;
//The function's parameter defines whether or not the transaction was sucessful
  public function __construct()
  {
    //add transaction to databse
    $this->db=new DB;
  }


  public function generateApiSecret(){
    return bin2hex(openssl_random_pseudo_bytes(10));
  }

  //this function adds a new merchant to the database.
  public function addMerchant($firstName,$lastName,$password,$telephone,$email,$dob){
   //api secret
   $secret=$this->generateApiSecret();
   $isSaved=$this->db->insert("insert into merchant(firstName,lastName,password,telephone,email,dob,wallet,apiSecret)
    values('{$firstName}','{$lastName}','{$password}','{$telephone}','{$email}','{$dob}','500','{$secret}')");

  return $isSaved;

}
//this function authenticates the merchant...

  public function authMerchant($email,$password)
  {
    return $this->db->select("select * from merchant where email='{$email}' and password='{$password}'");
  }
//Update the users password
  public function updatePassword($newPassword,$email)
  {
    return $this->db->update("update merchant SET password='{$newPassword}' WHERE email='{$email}'");
  }

  //Merchant email exist

  public function emailExist($email)
  {
      return $this->db->select("select email from merchant where email='{$email}'");
  }

  //verify api function
    public function verifyApiKey($key)
    {
      $merchantMail=$this->db->select("select email from merchant where apiSecret='{$key}'");
      if(empty($merchantMail))
      {
        return "Invalid Request";
      }
      else return $merchantMail['email'];
    }

    public function getApiSecret($email)
    {
      $apiSecret=$this->db->select("select apiSecret from  merchant where email='{$email}'");
      return $apiSecret['apiSecret'];
    }

    public function getMerchants()
    {
          $merchants=$this->db->all("select email from merchant");

          return $merchants;
    }
}

//$m=new Merchant;
//echo $m->addMerchant('dnfndfn','dnfndfn','dnfndfn','dnfndfn','dnfndfn','dnfndfn');
//echo "<br>".$m->authMerchant('adahhd','ddjsbdb');
//$m->updatePassword('sensible','dnfndfn');
//echo $m->emailExist('dnf');
//echo $m->checkBalance('et@gmail.com');
//echo $m->verifyApiKey('729b4d79130b97973');

//$m->getApiSecret('et@gmail.com');
  //$m->getMerchants();
 ?>
