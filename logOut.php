<?php
//$conn = oci_connect("system","123","//localhost/xe"); 
//session_start();
include ('session.php');
if(session_destroy()) // Destroying All Sessions
{
header("Location: logInPage1.php"); // Redirecting To Home Page
}
?>
