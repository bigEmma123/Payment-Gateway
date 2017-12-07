<?php
require_once "../classes/merchant.class.php";

//Collect input
$firstName=htmlspecialchars($_POST['fname']);
$lastName=htmlspecialchars($_POST['sname']);
$email=htmlspecialchars($_POST['email']);
$password=htmlspecialchars($_POST['pswd']);
$dob=htmlspecialchars($_POST['dob']);
$telephone=htmlspecialchars($_POST['num']);


if($password==$_POST['pswd_check'])
{
  $merchant=new Merchant;
  if($merchant->addMerchant($firstName,$lastName,$password,$telephone,$email,$dob))
  {
    echo "Abakade";
  }else{
    echo "Oyiwa";
  }

}

 ?>
