<?php

if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
if(empty($_SESSION["username"]))
{
    header("Location: ../loginform.php");
    exit();
}


?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<label>Enter your new <?php echo $_POST["placeholder_attr"];?>: </label>
<br>
<input type  = "text"  id = "newValue" placeholder = "Enter your new <?php echo $_POST["placeholder_attr"]; ?> here..." required style = "color: black">
<br>
<label>Confirm by typing in your password:</label>
<br>
<input type = "password" id = "pw" name = "password" placeholder="Enter your password here..." required style = "color: black">
<br>
<div class = "buttons">
<button id = "close-overlay">Cancel</button>
<button id = "submit-change">Change</button>
</div>
<div id = "err_msg"></div>

<script>

    $("#close-overlay").on("click", function(){
        $("#overlay").addClass("hidden");
        $("#overlay-content").addClass("hidden");
    });

    $("#submit-change").on("click", function(){
        $("#err_msg").html("");

        const param = "<?php echo $_POST["param"]; ?>";
        const newValue = $("#newValue").val();


        const pw = $("#pw").val();
        const kind = "<?php echo $_POST["kind"];?>";

        if(newValue != "" && pw != "") {
            $.post("../../account/change_info.php", {param: param, value: newValue, password: pw, kind: kind}, function (data) {
                var tempDiv = document.createElement('div');
                tempDiv.innerHTML = data;
                var pElements = tempDiv.getElementsByTagName('p');
                if (pElements.length > 0) {
                    $("#err_msg").html(data);
                }
                else{
                    $("#overlay").addClass("hidden");
                    $("#overlay-content").addClass("hidden");
                    alert("<?php echo $_POST["placeholder_attr"];?> successfully changed");
                    $.post("../../account/updateInfo.php", {param: param}, function(data){
                        $('h2[param=' + param + ']').html( $('h2[param=' + param + ']').attr("kind") +": "+ data);
                    });
                }
            });
        }
        else{
            alert("Please fill in all fields");
            $("input").filter(function(){
                return $(this).val() == "";
            }).css("background-color", "red")
        }

    });

</script>