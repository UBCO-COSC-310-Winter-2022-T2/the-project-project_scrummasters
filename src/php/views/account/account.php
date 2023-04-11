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
    <link rel = "stylesheet" href = "../../../css/account.css">
</head>
<body>


<div id = "options">
<ul>
    <li>
    <button id = "activateOnVisit" link = "account_info.php" class = "editAccountInfo">Edit Account Information</button>
    </li>

    <li>
        <button link = "change_pw.php" class = "editAccountInfo" >Change Password</button>
    </li>

    <li>
        <button id = "delete">Delete Account</button>
    </li>

</ul>

</div>


<div id = "content">

</div>

</body>
</html>

<script>

    $(document).ready(function() {
        $("#activateOnVisit").trigger("click");
    });

    $(".editAccountInfo").on("click", function(){
        const link = $(this).attr("link");
        $.get(link, function(data){
            $("#content").html(data);
        });

        $(this).addClass("active");
        $(this).prop("disabled", true);
        $(this).parent().siblings().children().removeClass("active");
        $(this).parent().siblings().children().prop("disabled", false);
    });

    $("#delete").on("click", function(){
        $.get("../../users/deleteAccount.php", function(data){
            window.location.href = "../../../html/homepage.html";
        });
    });

    



</script>