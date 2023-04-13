<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'ServerCreator.php';
    $serverCreator = new ServerCreator();
    echo("before doing anything");
    if($serverCreator::is_taken()){
        header('Location: ../views/newserver.php');
        die();
    }
    $serverCreator::add_server();
    header("Location: ../views/home.php");
}
else{
    echo "<p>Bad Request</p>";
}
?>