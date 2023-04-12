<!DOCTYPE html>
<?php session_start();
if(!empty($_SESSION["username"])) {
    include("../includes/navigation.php");
    include("../includes/serverList.php");
}
else{ header("Location: ../../html/loginform.php");}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Server</title>
    <link rel="stylesheet" href="../../css/auth.css">
    <link rel="stylesheet" href="../../css/buttons.css">


</head>
<body>

<div class = "auth-form">
    <h1 class = "auth-form-title"> Add Server</h1>


    <form method = "post" action = "../server/createServer.php" id = "add-server-form">
        <div class = "input-field">
            <label>Server Name: </label>
            <br>
            <input type = "text" name = "serverName" placeholder = "Server Name" required>
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
        <button>Create Server</button>
    </form>
</div>

</body>
</html>