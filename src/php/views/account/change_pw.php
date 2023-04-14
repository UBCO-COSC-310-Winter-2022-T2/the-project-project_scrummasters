<?php

if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
if(empty($_SESSION["username"]))
{
    header("Location: ../loginform.php");
    exit();
}


?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>

    <style>

        #confirmPasswordContainer{
            width:100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

</head>
<body>

<h1>Change My Password</h1>
<div id = "confirmPasswordContainer">
<label>Old Password:</label>
<br>
<input type = "password" id = "oldPassword" name = "oldPassword" class = "redIfEmpty" required>
    <div id="incorrectPasswordDisplayer"></div>
    <br>
<label>New Password:</label>
<br>

<input type = "password" id = "newPassword" name = "newPassword" class = "redIfInvalid redIfEmpty" required>
    <div class = "err"></div>
<br>
<label>Confirm New Password:</label>
<br>
<input type = "password" id = "confirmNewPassword" class = "redIfInvalid redIfEmpty" required>
    <div class = "err"></div>
<br>
<button id = "changePasswordButton">Change</button>
</div>

</body>
</html>


<script>
    var dontMakeNewPasswordAndConfirmPasswordWhite = false;
$("#changePasswordButton").on("click", function(e){
    const newPassword = $("#newPassword").val();
    const confirmNewPassword = $("#confirmNewPassword").val();
    const oldPassword = $("#oldPassword").val();


    if(newPassword =="" || confirmNewPassword == "" || oldPassword == "")
    {
        e.preventDefault();
        alert("Please fill in all fields");
        $(".redIfEmpty").filter(function(){
            return $(this).val() == "";
        }).css("background-color", "red");

    }

   else if(newPassword != confirmNewPassword)
   {
        e.preventDefault();
        const errMsg = $("<p style = \"color: red\">Passwords do not match</p>");
        $(".err").html(errMsg);

        $(".redIfInvalid").css("background-color", "red");
        dontMakeNewPasswordAndConfirmPasswordWhite = true;

    }

   else
   {
       $(".redIfInvalid").css("background-color", "white");
       $(".err").html("");
       $("#incorrectPasswordDisplayer").html("");
    $.post("../../account/change_pw.php", {oldPassword: oldPassword, newPassword: newPassword}, function(data){
        const tempDiv = document.createElement("div");
        tempDiv.innerHTML = data;
        if(tempDiv.getElementsByTagName("p").length > 0)
            $("#incorrectPasswordDisplayer").html(data);
        else
        {
            alert("Password successfully changed");
            $("#oldPassword").val("");
            $("#newPassword").val("");
            $("#confirmNewPassword").val("");
        }

    });
   }
});

$(".redIfEmpty").on("input", function(){

    $(this).css("background-color", "white");
    if(dontMakeNewPasswordAndConfirmPasswordWhite)
        $(".redIfInvalid").css("background-color", "red");
});

</script>