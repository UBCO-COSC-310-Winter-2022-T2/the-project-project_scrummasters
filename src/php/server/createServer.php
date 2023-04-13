<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'ServerCreator.php';
    $serverCreator = new ServerCreator();
//    if($serverCreator::is_taken()){
//        header('Location: ../views/newserver.php');
//        die();
//    }
    $server_id = $serverCreator::add_server();

    header("location: joinServer.php?serverID=$server_id");
}
else{
    echo "<p>Bad Request</p>";
}
?>