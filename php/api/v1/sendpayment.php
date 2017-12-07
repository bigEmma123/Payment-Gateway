<?php

require_once "../../classes/api.class.php";
require_once "../../classes/merchant.class.php";

if(isset($_GET['merchant']) && isset($_GET['amount'])&&isset($_GET['from']))
{

  //Filter the get request
  $merchantEmail=htmlentities($_GET['merchant']);
  $amount=htmlentities($_GET['amount']);
  $from=htmlentities($_GET['from']);
  if(!empty($merchantEmail))
  {

     $merchant=new Merchant;
     //verify key
     //$merchantEmail=$merchant->verifyApiKey($merchantKey);
     $api=new ApiCall($merchantEmail);
     $response=$api->addWallet($amount,$from,$merchantEmail);
     if($response)
     {
       header('HTTP/1.1 201 Created');
     }
  }else echo "Invalid Request";
}else echo "Invalid Request";








 ?>
