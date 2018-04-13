<?php

if (isset($_POST['submit'])) {
	$dbServername = "yusufddac.mysql.database.azure.com";
$dbUsername = "yusuf@yusufddac";
$dbPassword = "Abc12345";
$dbName = "ddac";

//database connection

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

  //getting data from the form..
  //mysqli_real_escape_string convert anything to string for security purpose...
/*
	$name = mysqli_real_escape_string($conn, $_POST['uname']);
	$email = mysqli_real_escape_string($conn, $_POST['uemail']);
	$password = mysqli_real_escape_string($conn, $_POST['upassword']);
	$address = mysqli_real_escape_string($conn, $_POST['uaddress']);
	$contact = mysqli_real_escape_string($conn, $_POST['ucontact']);
*/
	$user =  $_POST['user_name'];
	$email = $_POST['uemail'];
	$password = $_POST['pwd'];
	$address = $_POST['uaddress'];
	$contact = $_POST['ucontact'];

	//Error handling
	//check for empty fields
	if (empty($name) || empty($email) || empty($password) || empty($address) || empty($contact)){

		header("Location: ../signup.php?signup=empty");
		exit();


	} else{
    //check if input characters are valid..USING PREG_MATCH
    //checking name
		if (!preg_match("/^[a-zA-Z]*$/" , $name)){

		header("Location: ../signup.php?signup=invalid_Input");
		exit();
		} else{
			 //check if email is valid using php fucntion filter_var
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email_Format");
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE user_email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
        //validate available users
				if ($resultCheck > 0) {
							header("Location: ../signup.php?signup=user_exist");
							exit();
				}else{
					//Hashing password
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          //insert user data into Database
					$sql1 = "INSERT INTO users (user_address,  user_contact, user_email,user_name, user_password) VALUES ('$name','$email', '$hashedPassword', '$address', '$contact');";
					mysqli_query($conn, $sql1);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}

// if button was not clicked and entered using directory..send them back to signup page
} else {
	header("Location: ../index.php");
	exit();
}
