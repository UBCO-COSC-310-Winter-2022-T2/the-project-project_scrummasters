<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
session_start();
if(empty($_SESSION["username"])) {
    header("Location: loginform.php");
    exit();
}


require_once 'DirectMessagesGetter.php';

$_SESSION["friendUsername"] = $_POST["friendUsername"];

$directMessagesGetter = new DirectMessagesGetter();
$directMessages = $directMessagesGetter->getDirectMessages();

$username = $_SESSION["username"];
if ($directMessages && $directMessages->num_rows > 0) {
    // Loop through each row in the result
    while ($row = $directMessages->fetch_assoc()) {
        // Get the value of the column you want to use for the link
        $messageID = $row['messageID'];
        $message = $row['message'];
        $senderUsername = $row['sourceUsername'];

        echo('<div class = "message">');
        echo('<p class = "senderUsername">' . $senderUsername . '</p>');
        echo('<p class = "msgText">' . $message . '</p>');
        echo('</div>');
        echo('<br>');
    }
}
else echo("BE THE FIRST ONE TO SEND A MESSAGE");

unset($_SESSION["serverID"]);

?>

<script>
    $(document).ready(function(){
        $(".msgText").filter(function(){
            var msgTextSplit = $(this).text().split(" ");
            for(let i=0; i<msgTextSplit.length; i++) {
                if(msgTextSplit[i] == "@<?php echo $username; ?>") {
                    return true;
                }
            }
            return false;
        }).css("color", "gold");
    });


</script>
