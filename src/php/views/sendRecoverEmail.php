<?php
  //the code to be sent to the user for resetting the password
  session_start();
  $randomNumber = rand(100000, 999999);
  $_SESSION["resetCode"] = $randomNumber;
  // Send the number to the user's email address
  $to = $_POST["email"];
  $subject = "Password Reset Code";
  $message = "Your password reset code is: " . $randomNumber;
  $FROMEMAIL  = "dabrahamyan15@gmail.com";
  // Use the mail function to send the email
  mail($to, $subject, $message,"-f".$FROMEMAIL);

  // Redirect the user to the next step in the password reset process
  header("Location: ../../html/RecoverPassword.html");
  exit();
?>