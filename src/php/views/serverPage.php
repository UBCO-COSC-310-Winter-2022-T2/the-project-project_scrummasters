<!DOCTYPE html>
<html>
<head>
</head>
<body>
<style>
    html, body{
        background-color: #23272a;

    }
     .vertical-menu {
         display: block;
     }
    .vertical-menu a {
        display: block;
        color: #cccccc;
    }
</style>


<?php
//check if they are logged in
session_start();
if (empty($_SESSION["username"])) {
    header("Location: ../views/loginform.php");
    exit();
}
//get server id from the link
if(!isset($_GET['serverID'])){
    header("Location: ../views/home.php");
}
$serverID = $_GET['serverID'];
require_once '../server/serverInfoGetter.php';

//get information on the server and connect to db
$serverInfoGetter = new serverInfoGetter($serverID);
$_POST["serverID"] = $serverID;
$connection = $serverInfoGetter->connection;

//sql to get all messages from the especific server
$sql = 'SELECT * FROM servermessage WHERE serverID = ' . $serverID . ' ';
$result = mysqli_query($connection, $sql);
echo('<div class="vertical-menu">');

if ($result && $result->num_rows > 0) {
    // Loop through each row in the result
    while ($row = $result->fetch_assoc()) {
        // Get the value of the column you want to use for the link
        $messageID = $row['serverMessageID'];
        $message = $row['serverMessage'];
        $senderUsername = $row['senderUsername'];
        echo("<a> $message </a>");


    }
    echo('</div>');

    // Free the result set
    $result->free();
} else {
    echo "BE THE FIRST ONE TO SEND A MESSAGE!";
}
?>
<?php
//make the button call for the send message page
echo ("<form method = \"post\" action = \"../server/sendMessage.php?serverID=$serverID\">");
?>
    <div class = "input-field">
        <br>
        <input type = "text" name = "message" placeholder = "Enter your message here" required>
    </div>
    <button>Send</button>
</form>
</body>
