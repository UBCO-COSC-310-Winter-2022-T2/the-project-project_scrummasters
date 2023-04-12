<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




?>
<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #friendRequests {
            width: 75%;
            border: 4px solid black;
            border-radius: 4px;
            padding: 50px;
            background-color: #1e1f22;
        }

        .friendRequest{
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            align-items: center;
            margin-top: 20px;
            width: 100%;
        }

        #friendRequests label{
            display: inline-block;
        }

        .friendRequest button{
            float: right;
        }

        .friendRequest button{
            transform: translateY(-25%);
        }

    </style>
</head>
<body>
<h1>My Friend Requests</h1>
<div id = "friendRequests">

</div>
</body>
</html>

<script>

    getFriendsList();


    function getFriendsList()
    {
        $.get("get_friend_requests.php", function(data){
            $("#friendRequests").html(data);
        });
    }


    setInterval(getFriendsList, 5000);

</script>




