
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
    <button link = "account_info.php">Account Information</button>
    </li>

    <li>
        <button link = "change_name.php">Change Name</button>
    </li>

    <li>
        <button link = "change_username.php">Change Username</button>
    </li>

    <li>
        <button link = "change_email.php">Change Email</button>
    </li>

    <li>
        <button link = "change_phoneNumber.php">Change PhoneNumber</button>
    </li>

    <li>
        <button link = "change_password.php">Change Password</button>
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

</script>