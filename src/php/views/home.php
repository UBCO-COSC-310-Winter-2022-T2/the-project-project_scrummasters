<?php
session_start();
if(empty($_SESSION["username"])) {
    header("Location: loginform.php");
    exit();
}
include("../includes/navigation.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel = "stylesheet" href = "../../css/home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>



<div id = "container">
<div id = "servers"></div>
<div id = "friends"></div>
<div id = "content"></div>
</div>
<!-- Your content goes here -->

<!-- Add your JavaScript/jQuery file links here -->

<script>
    $(document).ready(function() {
        $.get("../includes/serverList.php", function(data){
            $("#servers").html(data);
        });
    });


</script>
</body>
</html>

