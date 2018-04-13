<?php

if (isset($_POST['submit'])) {
	//include_once 'dbc.inc.php';
$dbServername = "yusufddac.mysql.database.azure.com";
$dbUsername = "yusuf@yusufddac";
$dbPassword = "Abc12345";
$dbName = "ddac";

//database connection

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


  //getting data from the form..
  //mysqli_real_escape_string convert anything to string for security purpose...

	$Ctype =  $_POST['btype'];
	$Cfrom = $_POST['bfrom'];
	$Cto = $_POST['bto'];
	$Cdep = $_POST['bdep'];
  $Cc = $_POST['bc'];

  //insert user data into Database
  $sql1 = "INSERT INTO booking (conb_type, conb_from, conb_to, conb_dep, userb_name) VALUES ('$Ctype','$Cfrom',
    '$Cto', '$Cdep', '$Cc');";
  mysqli_query($conn, $sql1);
  header("Location: ../index.php?Booked=success");
  exit();

}else{

  header("Location: ../index.php?Back");
  exit();

}
