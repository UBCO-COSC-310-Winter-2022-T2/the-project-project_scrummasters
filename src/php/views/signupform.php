<!DOCTYPE html>
<?php if (session_status() != PHP_SESSION_ACTIVE) {session_start();} ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../../css/auth.css">
  <link rel="stylesheet" href="../../css/buttons.css">


</head>
<body>

<div class = "auth-form">
  <h1 class = "auth-form-title"> Sign Up</h1>


  <form method = "post" action = "../auth/signup/signup.php" id = "signup-form">
    <div class = "input-field">
      <label>First Name: </label>
      <br>
      <input type = "text" name = "firstName" placeholder = "Enter your first name here" required>
    </div>


    <div class = "input-field">
      <label>Last Name: </label>
      <br>
      <input type = "text" name = "lastName" placeholder = "Enter your last name here" required>
    </div>

    <div class = "input-field">
      <label>Email: </label>
      <br>
        <?php
        if(!empty($_SESSION["email_err"])) {
            $email = $_SESSION["email_err"];
            echo "<p class = \"err\" style = \"color: red\"> The email \"$email\" already exists </p>";
            unset($_SESSION["email_err"]);
        }

        ?>
      <input type = "email" name = "email" placeholder = "Enter your email here"  required>
    </div>

    <div class = "input-field">
      <label>Phone Number: </label>
      <br>
        <?php
        if(!empty($_SESSION["phone_err"])) {
            $phone = $_SESSION["phone_err"];
            echo "<p class = \"err\" style = \"color: red\"> The phone number \"$phone\" already exists </p>";
            unset($_SESSION["phone_err"]);
        }
        ?>
      <input type = "tel" name = "phoneNumber" placeholder = "Enter your number here" required>
    </div>


    <div class = "input-field">
      <label>Username: </label>
      <br>
        <?php
        if(!empty($_SESSION["user_err"])) {
            $user = $_SESSION["user_err"];
            echo "<p class = \"err\" style = \"color: red\"> The username \"$user\" already exists </p>";
            unset($_SESSION["user_err"]);
        }
        ?>
      <input type = "text" name = "username" placeholder = "Enter your username here" required>
    </div>

    <div class = "input-field">
      <label>Password: </label>
      <br>
      <input id = "password" type = "password" name = "password" placeholder = "Enter your password here" required>
    </div>

    <div class = "input-field">
      <label>Confirm Password: </label>
      <br>
      <input id = "confirm-password" type = "password" placeholder = "Enter your username here" required>
    </div>

    <button>Sign Up</button>
  </form>
</div>

<script>
  function checkIfPasswordsMatch(e) {
    let password = document.getElementById("password");
    let confirmPassword = document.getElementById("confirm-password");
    if(password.value != confirmPassword.value) {
      alert("Passwords Don't Match. Please try again.")
      password.style.backgroundColor = "red";
      confirmPassword.style.backgroundColor = "red";
      e.preventDefault();
    }
  }

  var submitForm= document.getElementById("signup-form");
  submitForm.addEventListener("submit", checkIfPasswordsMatch);

</script>

</body>
</html>