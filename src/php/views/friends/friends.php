<?php

session_start();
if(empty($_SESSION["username"]))
{
    header("Location: ../loginform.php");
    exit();
}


?>

<!DOCTYPE html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel = "stylesheet" href = "../../../css/buttons.css">
    <link rel = "stylesheet" href = "../../../css/friends.css">
</head>
<body>


<div id = "options">
    <ul>
        <li>
            <button id = "initial" link = "friends_list.php">Friends List</button>
        </li>

        <li>
            <button link = "friend_requests.php">Friend Requests</button>
        </li>

    </ul>

</div>


<div id = "content">

</div>

</body>
</html>

<script>

    $("button").on("click", function(){
        const link = $(this).attr("link");
        $.get(link, function(data){
            $("#content").html(data);
        });

        $(this).addClass("active");
        $(this).prop("disabled", true);
        $(this).parent().siblings().children().removeClass("active");
        $(this).parent().siblings().children().prop("disabled", false);
    });

    $("#initial").trigger("click");

</script>