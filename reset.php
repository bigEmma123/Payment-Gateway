<!DOCTYPE html>

<?php
$submit=filter_input(INPUT_POST,'submit',FILTER_DEFAULT);
$PASS1=filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING);
$PASS2=filter_input(INPUT_POST,'cpass',FILTER_SANITIZE_STRING);

$message = "New Password";

if (isset($submit)){
	if(strcmp($PASS1,$PASS2)){
		
		$conn = new mysqli("localhost", "root", "", "epay") or die(mysqli_error($conn));

		$sql = "UPDATE `pers_info` SET `pswd`='$PASS1' WHERE num=0123456";
	
		$result = $conn->query($sql);
		
		if ($result){
			$message = "SET";
		} else {
			$message = "Error";
		}
	}
}
?>


<html>

<head>
	<title>Sand</title>
</head>

<body>
	<form action="" method="post" style="margin-left:auto; margin-right:auto;">
		<input name="pass" type="password" placeholder="Password"><br>
		<input name="cpass" type="password" placeholder="Confirm Password"><br>
		<input type="submit" name="submit" value="Reset Password"><br>
	</form>
	<p><?php if ($message != ""){echo 
	$message;} ?></p>
</body>

</html>

