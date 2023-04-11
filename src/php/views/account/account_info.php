<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php


if (empty($_SESSION["username"])) {
    header("Location: ../loginform.php");
    exit();
}

require_once '../../account/AccountInfoGetter.php';
$accountInfoGetter = new AccountInfoGetter();
?>
<div class = "container">
<h1> My Account Information</h1>

<div id = "account-info">
<div class = "field" >
<h2 style="display: inline;" param = "firstName" kind = "First Name"> First Name: <?php echo $accountInfoGetter->getFirstName(); ?></h2>
<button class = "edit-field" param = "firstName" placeholder_attr = "first name">Edit</button>
</div>

<div class = "field" >
<h2 style="display: inline;" param = "lastName" kind = "Last Name"> Last Name: <?php echo $accountInfoGetter->getLastName(); ?></h2>
<button class = "edit-field" param = "lastName" placeholder_attr = "last name">Edit</button>
</div>

    <div class = "field" >
        <h2 style="display: inline;" param = "username" kind = "Username"> Username: <?php echo $accountInfoGetter->getUsername() ?> </h2>
        <button class = "edit-field" param = "username" placeholder_attr = "username">Edit</button>
    </div>


<div class = "field" >
<h2 style="display: inline;"  param = "email" kind = "Email Address"> Email Address: <?php echo $accountInfoGetter->getEmail(); ?> </h2>
<button class = "edit-field" param = "email" placeholder_attr = "email address">Edit</button>
</div>

<div class = "field">
<h2 style="display: inline;" param = "phoneNumber" kind = "Phone Number">Phone Number: <?php echo $accountInfoGetter->getPhoneNumber(); ?></h2>
<button class = "edit-field" param = "phoneNumber" placeholder_attr = "phone number">Edit</button>
</div>
</div>
</div>

<div id = "overlay" class = "hidden">
    <div id = "overlay-content" class = "hidden">

    </div>
</div>
<script>

    $(".edit-field").on("click", function(){
        const param = $(this).attr("param");
        const placeholderAttr = $(this).attr("placeholder_attr");

        $.post("overlay_content.php", {param: param, placeholder_attr: placeholderAttr},  function(data){
            $("#overlay").removeClass("hidden");
            $("#overlay-content").removeClass("hidden");
            $("#overlay-content").html(data);


        });
    });





</script>