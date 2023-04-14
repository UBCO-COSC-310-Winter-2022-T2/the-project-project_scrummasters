<?php
  // Start the session and get the reset code
  session_start();
  $resetCode = $_SESSION["resetCode"];
  
  // Check if the code entered by the user matches the reset code
  $code = $_POST["code"];
  $newPassword = $_POST["newPassword"];
  $confirmPassword = $_POST["confirmPassword"];
  
  // Check if the code is correct
  if ($code == $resetCode) {
    // Check if the new password and confirmation match
    if ($newPassword == $confirmPassword) {
      // Update the user's password in the database
      // ...
      echo "Your password has been reset!";
    } else {
      echo "The new password and confirmation do not match.";
    }
  } else {
    echo "The code entered is incorrect.";
  }
  
  // Clear the session variable
  unset($_SESSION["resetCode"]);
?>