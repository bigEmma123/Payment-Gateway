<?php
//All requests will be returned in json format
require_once "db.class.php";
require_once "transaction.class.php";
class ApiCall{

private $db;
private $walletAmnt;
private $transaction;

  public function __construct($email)
  {
   $this->db=new DB;
   $this->transaction=new Transaction;
   $amnt=$this->db->select("select wallet from merchant where email='{$email}'");
   $this->walletAmnt=(int)$amnt['wallet'];
  }



  //Debit Merchant's Account

  public function subtractWallet($amount,$to,$merchant)
  {
     // collect balance subtract amount and update field ,save transaction
       $totalAmount=$this->walletAmnt;
       $amntLeft=$totalAmount-(int)$amount;
       //Updating the table
       if($this->db->update("update merchant SET wallet='{$amntLeft}' WHERE email='{$merchant}'"))
       {
         //Save Transaction
          if($this->transaction->saveTransaction($amntLeft,'debit',$to,$merchant))
          {
            return true;
          }

       }
       else return false;
  }


  //Credit Merchant's Account
  public function addWallet($amount,$from,$merchant)
  {

    $totalAmount=$this->walletAmnt;
    $amntLeft=$totalAmount+(int)$amount;
    //Updating the table
    if($this->db->update("update merchant SET wallet='{$amntLeft}' WHERE email='{$merchant}'"))
    {
      //Save Transaction
       if($this->transaction->saveTransaction($amntLeft,'credit',$from,$merchant))
       {
         return true;
       }

    }
    else return false;
  }


  //Check Account Balance
  public function checkBalance($email)
  {
     $amount=$this->db->select("select wallet from merchant where email='{$email}'");
     $array=['wallet'=>$amount['wallet']];
     return json_encode($array,JSON_UNESCAPED_SLASHES);
  }

  public function getTransactions()
  {
    $result=$this->db->all('select * from transactions LIMIT 5');

    return stripslashes(json_encode($result));
  }


}

//$a=new ApiCall('et@gmail.com');
//echo $a->subtractWallet(30,'client','et@gmail.com');
 ?>
