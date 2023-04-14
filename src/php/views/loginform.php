<!DOCTYPE html>
if (session_status() != PHP_SESSION_ACTIVE) {session_start();} ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="../../css/auth.css">
    <link rel="stylesheet" href="../../css/buttons.css">
    <style>
        .signup{
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .signup p{
            color: white;
        }
    </style>
</head>
<body>

<div class = "auth-form">
<h1 class = "auth-form-title"> Log In</h1>


<form method = "post" action = "../auth/login/login.php">
    <?php
    session_start();
    if(!empty($_SESSION["login_err"]))
    {
        echo $_SESSION["login_err"];
        unset($_SESSION["login_err"]);
    }
    ?>
    <div class = "input-field">
  <label>Username: </label>
        <br>
  <input type = "text" name = "username" placeholder = "Enter your username here" required>
    </div>

    <div class = "input-field">
  <label>Password: </label>
        <br>
  <input type = "password" name = "password" placeholder = "Enter your password here" required>
    </div>
  <button>Log In</button>
    <div class = "signup">
    <a href = "signupform.php" ><p>Don't have an account?</p></a>
        <div>
</form>
</div>

</body>
</html>