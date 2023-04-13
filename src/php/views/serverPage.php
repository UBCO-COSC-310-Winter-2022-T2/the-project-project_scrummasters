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



echo('<div class="vertical-menu">');
echo ('<div id = "messages">');

    echo ('</div>');
    ?>

    <div id = "msgBoxContainer">
        <br>
        <input type = "text" name = "message" placeholder = "Enter your message here" required id = "msgBox">
    </div>

    </div>





</body>

<script>


    $(document).ready(function(){
        function displayServerMessages() {
            $.post("../server/displayServerMessages.php", {serverID:  <?php echo $serverID; ?> }, function(data){
                $("#messages").html(data);
            });
        }

        $("#msgBox").on("keydown", function(event){
            if(event.key == "Enter") {
                const serverMessage = $("#msgBox").val();
                if(serverMessage!="") {
                    $.post("../server/sendMessage.php", {
                        serverID: <?php echo $serverID ?>,
                        serverMessage: serverMessage
                    }, function (data) {
                        displayServerMessages();
                        $("#msgBox").val("");

                        $("#messages").scrollTop($("#messages").prop("scrollHeight"));
                    });
                }
            }
        });

        displayServerMessages();
        setInterval(displayServerMessages, 5000);
    });



</script>
