<?php

session_start();

?>

<!DOCTYPE HTML>
<!--
Road Trip by TEMPLATED
templated.co @templatedco
Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
 <title> || CMS || Container Management System || tp032725 ||</title>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>

 <!-- Header -->
   <header id="header">
     <div class="logo"><a href="index.php"><img src="images/logoCMS.png" alt="Logo"></a></div>
     <a href="#menu"><span>Menu</span></a>
   </header>

 <!-- Nav -->
   <nav id="menu">

     <?php
     //session awarness
     if(isset($_SESSION['user_name'])){
        echo '<b>Hello, </b>';
        echo $_SESSION['user_name'];
     }
     ?>

     <?php
     //logout
       if(isset($_SESSION['user_name'])){
       echo'<form action="includes/logout.inc.php" method="POST">
            <button type= "submit" name= "submit">Logout</button>
       </form>


       <form action="booking.php" method="POST">
       <button type="submit name"submit" <a href="booking.php">Book</a></button>
       </form>

       <form action="viewbook.php" method="POST">
       <button type="submit name"submit" <a href="viewbook.php">View Booking</a></button>


       </form>';




       // other links!!
     }else{
       echo'<ul class="links">

         <li><a href="index.php">Home</a></li>
         <li><a href="generic.php">Log In</a></li>
         <li><a href="Signup.php">Sign up</a></li>
         <li><a href="ContactUs.html">Contact Us</a></li>

       </ul>';

     }
   ?>



   </nav>
