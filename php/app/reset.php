<?php
require_once "../classes/merchant.class.php";
$email=htmlentities($_POST['reset_email']);
$new_pswd=htmlentities($_POST['new_pswd']);
$check_pswd=htmlentities($_POST['pswd_check']);

//password match
if($new_pswd==$check_pswd)
{
$merchant=new Merchant;
//Check whether email exist
if($merchant->emailExist($email))
{
  //update the users password
  if($merchant->updatePassword($new_pswd,$email))
  {
    echo "Abakade your password has been reset";
  }
  else echo "oyiwa could not update";
}
else echo "Please you are not in our records";

}else echo 'your passwords do not match';


 ?>
