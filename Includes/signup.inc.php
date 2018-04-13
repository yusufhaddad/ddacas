<?php

if (isset($_POST['submit'])) {

$dbServername = "yusufddac.mysql.database.azure.com";
$dbUsername = "yusuf@yusufddac";
$dbPassword = "Abc12345";
$dbName = "ddac";

//database connection

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);



	$name =  $_POST['username1'];
	$email = $_POST['useremail1'];
	$password = $_POST['passwd1'];
	$address = $_POST['useraddress1'];
	$contact = $_POST['usercontact1'];

	//Error handling
	//check for empty fields
	if (empty($name) || empty($email) || empty($password) || empty($address) || empty($contact)){

		header("Location: ../signup.php?signup=empty");
		exit();


	} else{
    //check if input characters are valid..USING PREG_MATCH
    //checking name
		if (!preg_match("/^[a-zA-Z]*$/", $name)){

		header("Location: ../signup.php?signup=invalid_Input");
		exit();
		} else{
			 //check if email is valid using php fucntion filter_var
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email_Format");
				exit();
			}else{
				$sql = "SELECT * FROM users1 WHERE user_email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
        //validate available users
				if ($resultCheck > 0) {
							header("Location: ../signup.php?signup=user_exist");
							exit();
				}else{
				
          //insert user data into Database
					$sql11 = "INSERT INTO users1 (user_name, user_email, user_password, user_address, user_contact) VALUES ('$name','$email', 
					$password, '$address', '$contact');";
					mysqli_query($conn, $sql11);
					header("Location: ../signup.php?signup=success1");
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
