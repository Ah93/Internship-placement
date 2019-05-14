<?php
// checkLogin.php

session_start(); // Start a new session
$conn = oci_connect("system","123","//localhost/xe"); // Holds all of our database connection information
 if ('POST' !== $_SERVER['REQUEST_METHOD']) {
  $random1 = mt_rand(1,5);
  $random2 = mt_rand(1,5);
  $_SESSION['math_result'] = $random1+$random2;
 
}
else {
	
  $test = (int) $_POST['numberInput'];
  if ($test !== $_SESSION['math_result']) {
   	echo "<script>alert('wrong');</script>";
   	header("Location: sup.php");
  }else{
  	$error=''; // Variable To Store Error Message
	
if(isset($_POST['submit'])){
	// Get the data passed from the form
$adminId = $_POST['adminId'];
$password = $_POST['password'];
 
// Do some basic sanitizing
$adminId = stripslashes($adminId);
$password = stripslashes($password);
 if($adminId == 'admin' && $password == 'admin' ){
	 header('Location: dbaAuthentication.php');
	 
 }else{$message = "Matric No or Password is invalid";
	echo "<script type='text/javascript'>alert('$message')
	location.href = 'loginPage1.php'</script>";}
	 $sql = "select adminId,password from admin where adminId = '$adminId' and password = '$password'";
$result = oci_parse($conn,$sql);
 oci_execute($result, OCI_DEFAULT);
$count = 0;
 
while ($line = oci_fetch_assoc($result)) {

     $count++;
}

if ($count == 1) {
   
	 $_SESSION['login_user']=$adminId;
     header("Location: sup.php"); // This is wherever you want to redirect the user to
	
} else {
     
     $message = "Matric No or Password is invalid";
	echo "<script type='text/javascript'>alert('$message')
	location.href = 'loginPage1.php'</script>";}
}
 }

  }

?>