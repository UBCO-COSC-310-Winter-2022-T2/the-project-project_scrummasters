<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php

if (session_status() != PHP_SESSION_ACTIVE) {session_start();}

if (empty($_SESSION["username"])) {
    header("Location: ../loginform.php");
    exit();
}

require_once '../../account/AccountInfoGetter.php';
$accountInfoGetter = new AccountInfoGetter();
?>

<?php

if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
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

    <style>
        .field{
            display: flex;
            width: 100%;
            margin-top: 20px;
            align-items: center;
        }

        .container{
            display: flex;
            width: 100%;
            flex-direction: column;
            align-items: center;
        }   
        
    

        .field h2{
            font-size: 1.2em;
            display: inline;
            flex-basis: 100%; /* Adjust this value to control the width percentage of the h2 element */
            overflow-wrap: break-word;
        }

        .hidden{
            display: none !important;
        }

    </style>
</head>
<body>

<div class = "container">
<h1> My Account Information</h1>

<div id = "account-info">
<div class = "field" >
<h2 param = "firstName" kind = "First Name"> First Name: <?php echo $accountInfoGetter->getFirstName(); ?></h2>
<button class = "edit-field" param = "firstName" placeholder_attr = "first name">Edit</button>
</div>

<div class = "field" >
<h2  param = "lastName" kind = "Last Name"> Last Name: <?php echo $accountInfoGetter->getLastName(); ?></h2>
<button class = "edit-field" param = "lastName" placeholder_attr = "last name">Edit</button>
</div>

    <div class = "field" >
        <h2  param = "username" kind = "Username"> Username: <?php echo $accountInfoGetter->getUsername() ?> </h2>
        <button class = "edit-field" param = "username" placeholder_attr = "username">Edit</button>
    </div>


<div class = "field" >
<h2   param = "email" kind = "Email Address"> Email Address: <?php echo $accountInfoGetter->getEmail(); ?> </h2>
<button class = "edit-field" param = "email" placeholder_attr = "email address">Edit</button>
</div>

<div class = "field">
<h2  param = "phoneNumber" kind = "Phone Number">Phone Number: <?php echo $accountInfoGetter->getPhoneNumber(); ?></h2>
<button class = "edit-field" param = "phoneNumber" placeholder_attr = "phone number">Edit</button>
</div>
</div>
</div>

<div id = "overlay" class = "hidden">
    <div id = "overlay-content" class = "hidden">

    </div>
</div>

</body>
</html>



<script>

    $(".edit-field").on("click", function(){
        const param = $(this).attr("param");
        const placeholderAttr = $(this).attr("placeholder_attr");
        const kind = $(this).siblings("h2").filter(function(){
            return $(this).attr("param") == param;
        }).attr("kind");

        $.post("overlay_content.php", {param: param, placeholder_attr: placeholderAttr, kind: kind},  function(data){
            $("#overlay").removeClass("hidden");
            $("#overlay-content").removeClass("hidden");
            $("#overlay-content").html(data);


        });
    });


    $(document).ready(function() {
  function adjustWidth() {
    $('.field').each(function() {
      var parentWidth = $(this).width();
      var h2Size = parentWidth * 0.025; // Adjust the 0.5 value to set the desired width percentage relative to the parent div's width
     $(this).find('h2').css('font-size', h2Size + 'px');
    });
  }

  adjustWidth();

  // If you want the width to adjust when the window is resized, you can call the adjustWidth function on window resize event:
  $(window).on('resize', adjustWidth);
});

    


</script>