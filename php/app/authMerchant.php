<?php
require_once "../classes/merchant.class.php";
session_start();
ob_start();
$email=htmlentities($_POST['email']);
$password=htmlentities($_POST['psw']);

  $merchant=new Merchant;

  if($merchant->authMerchant($email,$password))
  {
    $_SESSION['login_user'] = $email;
    header("location: ../../dashboard.php");

  }else
  echo "Oyiwa Wrong Username or password";



ob_flush();
?>
