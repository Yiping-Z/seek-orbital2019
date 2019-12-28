<?php
 session_start();
 require 'dbconfig/config.php';
 if ($_SESSION["username"]) {
      include("header.php"); 
 }
?>

<html>
  <head>
  	<title>Homepage</title>
  	</head>    
      
  <?php
   include ('account.php');
   include ('mypost.php');
  ?>
</body>
</html>
