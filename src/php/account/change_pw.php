<?php
session_start();
if($_SERVER["REQUEST_METHOD"]!="POST")
{
    header("Location: ../../html/badrequest.html");
    exit();
}

require 'PasswordChanger.php';
$_SESSION["newPassword"] = md5($_POST["newPassword"]);
$_SESSION["oldPassword"] = md5($_POST["oldPassword"]);

$passwordChanger = new PasswordChanger();
if($passwordChanger->confirmPassword())
    $passwordChanger->changePassword();
else echo "<p style = \"color: red\">Sorry, your old password was incorrect. Please try again.";


unset($_SESSION["oldPassword"]);
unset($_SESSION["newPassword"]);

?>