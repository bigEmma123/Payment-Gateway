<?php
header("Content-type:application/json");
require_once "../../classes/api.class.php";
require_once "../../classes/merchant.class.php";

if(isset($_GET['key']))
{

  //Filter the get request
  $merchantKey=htmlentities($_GET['key']);
  if(!empty($merchantKey))
  {

     $merchant=new Merchant;
     //verify key
     $merchantEmail=$merchant->verifyApiKey($merchantKey);
     $api=new ApiCall($merchantEmail);
     $transactions=$api->getTransactions();
     echo $transactions;
  }else echo "Invalid Request";
}else echo "Invalid Request";








 ?>
