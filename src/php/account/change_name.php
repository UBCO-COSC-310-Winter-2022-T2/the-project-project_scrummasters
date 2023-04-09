<?php
session_start();
require_once 'NameChanger.php';

if($_SERVER["REQUEST_METHOD"] != "POST")
{
    header("Location: ../../html/badrequest.html");
    exit();
}



$_SESSION["newFirstName"] = $_POST["newFirstName"];
$_SESSION["newLastName"] = $_POST["newLastName"];


$nameChanger = new NameChanger();
$nameChanger->changeName();


unset($_SESSION["newFirstName"]);
unset($_SESSION["newLastName"]);



//header("Location: ../views/account/account.php");



?>






