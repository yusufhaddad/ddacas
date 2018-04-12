<?php

session_start();

 if (isset($_POST['submit'])){

   include_once 'dbh.inc.php';


   $email = $_POST['user_email'];
   $password =  $_POST['pwd'];

   //error handlers
   //chcek if input are empty
   if (empty($email) || empty($password)){
     header("Location: ../index.php?login=empty");
     exit();

   }else{
     $sql = "SELECT * FROM users WHERE user_email='$email'";
     $result = mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);

     //validate available users
     if ($resultCheck < 1) {
       header("Location: ../index.php?login=error1");
       exit();
     }else{

       if ($row = mysqli_fetch_assoc($result)){
         //de-hashing the PASSWORD
         $hashedpwdcheck = password_verify($password, $row['user_password']);
            if ($hashedpwdcheck == false){

              header("Location: ../index.php?login=error2");
              exit();


            }elseif($hashedpwdcheck == true){
              //log in user here-- session variable super globale access pages
              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION['user_name'] = $row['user_name'];
              $_SESSION['user_email'] = $row['user_email'];

              header("Location: ../index.php?login=success");
              exit();

          }
       }
     }
   }


 }else{

   header("Location: ../index.php?login=error");
   exit();

 }
