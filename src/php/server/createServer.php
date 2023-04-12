<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'ServerCreator.php';

    $serverCreator = new ServerCreator();


    $serverCreator->insert();
    header("Location: ../views/home.php");
}
else{
    echo "<p>Bad Request</p>";
}
?>