<?php

include("connect.php");


$fname=$_POST['fname'];
$sname=$_POST['sname'];
$pswd=$_POST['pswd'];
//collect email
$email=$_POST['email'];
$dob=$_POST['dob'];
$num=$_POST['num'];



$sql="INSERT INTO `pers_info`(`fname`, `sname`, `pswd`, `dob`, `num`,'email') VALUES
 ('$fname','$sname','$pswd','$dob','$num','$email')";

if (mysqli_query($con,$sql))
{
    echo"abakade";

}
else {

	echo "oyiwa";
    exit;
	}
mysqli_close($con);

?>
