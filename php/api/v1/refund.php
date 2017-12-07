<?php



require_once "../../classes/api.class.php";
require_once "../../classes/merchant.class.php";

if(isset($_GET['key']) && isset($_GET['amount'])&&isset($_GET['to']))
{

  //Filter the get request
  $merchantKey=htmlentities($_GET['key']);
  $amount=htmlentities($_GET['amount']);
  $to=htmlentities($_GET['to']);
  if(!empty($merchantKey))
  {

     $merchant=new Merchant;
     //verify key
     $merchantEmail=$merchant->verifyApiKey($merchantKey);
     $api=new ApiCall($merchantEmail);
     $response=$api->subtractWallet($amount,$to,$merchantEmail);
     if($response)
     {
       header('HTTP/1.1 201 Created');
     }
  }else echo "Invalid Request";
}else echo "Invalid Request";








 ?>
