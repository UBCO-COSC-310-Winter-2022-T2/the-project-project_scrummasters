<!DOCTYPE html>
<?php session_start();
if(!empty($_SESSION["username"])) {
    require_once("../includes/navigation.php");
}
else{ header("Location: ../../html/loginform.php");}?>
<!--<html lang="en">-->
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
<!--            --><?php
//            if(!empty($_SESSION["server_err"])) {
//                $server_name = $_SESSION["server_err"];
//                echo "<p class = \"err\" style = \"color: red\"> The email \"$server_name\" already exists </p>";
//                unset($_SESSION["server_err"]);
//            }
//            ?>
            <input type = "text" name = "serverName" placeholder = "Server Name" required>
        </div>
        <button>Create Server</button>
    </form>
</div>

</body>
<!--</html>-->