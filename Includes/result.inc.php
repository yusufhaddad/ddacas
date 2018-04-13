<?php

if (isset($_POST['submit'])) {
	//database connection
$dbServername = "yusufddac.mysql.database.azure.com";
$dbUsername = "yusuf@yusufddac";
$dbPassword = "Abc12345";
$dbName = "ddac";

//database connection

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

  //getting data from the form..
  //mysqli_real_escape_string convert anything to string for security purpose...

	$Ctype =  $_POST['Container_type'];
	$Cfrom = $_POST['Container_from'];
	$Cto = $_POST['Container_to'];
	$Cdep = $_POST['Container_departure'];
  $Cclient = $_POST['Container_client'];

  //insert user data into Database
  $sql1 = "INSERT INTO booked (bc_type, bc_from, bc_to, bc_dep, buser_name) VALUES ('$Ctype','$Cfrom',
    '$Cto', '$Cdep', '$Cclient');";
  mysqli_query($conn, $sql1);
  header("Location: ../index.php?Booked=success");
  exit();

}else{

  header("Location: ../index.php?Back");
  exit();

}
