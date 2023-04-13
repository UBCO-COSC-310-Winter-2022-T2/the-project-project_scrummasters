<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<html>
<head>
</head>
<body>
<style>
    html, body{
        background-color: #23272a;

    }
     .vertical-menu {
         height: 100%;
         display: flex;
         flex-direction: column;
     }
    .vertical-menu p {

        color: #cccccc;
    }

    .message{
        display: inline-block;
        margin-top: 10px;
        background-color: #1f2c33;
        padding: 10px;
        border-radius: 20px;
    }
    p.senderUsername{
        color:#05aa6d;
    }
    #messages{
        overflow-y: scroll;
        margin-left: 10px;
        height: 90%;
    }

    #msgBoxContainer{
        height: 10%;
        background-color: #1e1f22;
        margin-top: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #msgBox{
        width: 50%;
        height: 50%;
        border-radius: 20px;
    }

</style>


<?php
//check if they are logged in
session_start();
if (empty($_SESSION["username"])) {
    header("Location: ../loginform.php");
    exit();
}
//get server id from the link
$serverID = $_GET['serverID'];
$username = $_SESSION["username"];
require_once '../server/serverInfoGetter.php';
//get information on the server and connect to db
$serverInfoGetter = new serverInfoGetter($serverID);
$_POST["serverID"] = $serverID;
$connection = $serverInfoGetter->connection;

//sql to get all messages from the especific server
$sql = 'SELECT * FROM servermessage WHERE serverID = ' . $serverID . ' ';
$result = mysqli_query($connection, $sql);
echo('<div class="vertical-menu">');
echo ('<div id = "messages">');
if ($result && $result->num_rows > 0) {
    // Loop through each row in the result
    while ($row = $result->fetch_assoc()) {
        // Get the value of the column you want to use for the link
        $messageID = $row['serverMessageID'];
        $message = $row['serverMessage'];
        $senderUsername = $row['senderUsername'];

        echo ('<div class = "message">');
        echo('<p class = "senderUsername">'. $senderUsername. '</p>');
        echo('<p class = "msgText">'. $message .'</p>');
        echo('</div>');
        echo ('<br>');



    }
    echo ('</div>');
    ?>

    <div id = "msgBoxContainer">
        <br>
        <input type = "text" name = "message" placeholder = "Enter your message here" required id = "msgBox">
    </div>

    </div>

<?php
    // Free the result set
    $result->free();
} else
    echo "BE THE FIRST ONE TO SEND A MESSAGE!";
?>



</body>

<script>
    $(document).ready(function(){
        $(".msgText").filter(function(){
            var msgTextSplit = $(this).text().split(" ");
            console.log(msgTextSplit[0]);
            for(let i=0; i<msgTextSplit.length; i++)
            {
                if(msgTextSplit[i] == "@<?php echo $username; ?>")
                {
                    console.log(msgTextSplit[0]+" is true");
                    return true;
                }
            }
            return false;
        }).css("color", "gold");
    })


</script>
