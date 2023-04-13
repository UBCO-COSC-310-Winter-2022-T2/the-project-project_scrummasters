<?php

session_start();

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
        #potentialFriendsList {
            width: 75%;
            border: 4px solid black;
            border-radius: 4px;
            padding: 50px;
            background-color: #1e1f22;
        }

        .potentialFriend{
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            align-items: center;
            margin-top: 20px;
            width: 100%;
        }


        #potentialFriendsList label{
            display: inline-block;
        }

        .potentialFriend button{
            float: right;
        }

        .potentialFriend button{
            transform: translateY(-25%);
        }



    </style>
</head>
<body>
<h1>Add Friends</h1>
<div id = "potentialFriendsList">

</div>
</body>
</html>

<script>

    getFriendsList();


    function getFriendsList()
    {
        $.get("get_potential_friends_list.php", function(data){
            $("#potentialFriendsList").html(data);
        });
    }


    setInterval(getFriendsList, 5000);

</script>