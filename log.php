<?php

include("connect.php");

session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($con,$_POST['psw']); 
      
      $sql = "SELECT * FROM pers_info WHERE num = '$myusername' and pswd = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);
      $active = $row['user'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: dashboard.html");
      }else {
         echo "<script>alert ('Your Login Name or Password is invalid');</script>";
      return 0;
      }
   }
?>