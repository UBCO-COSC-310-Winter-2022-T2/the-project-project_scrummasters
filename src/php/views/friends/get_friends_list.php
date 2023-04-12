<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php

session_start();
if(empty($_SESSION["username"]))
{
    header("Location: ../loginform.php");
    exit();
}


require_once '../../friends/FriendsListGetter.php';
$friendsListGetter = new FriendsListGetter();
$result = $friendsListGetter->getFriends();
?>

 <?php
    while($row = $result->fetch_assoc())
    {
        ?>
        <div class = "friend">
            <h2><?php echo $row["friend"]; ?> </h2>
            <button class = "removeFriendButton" friendUsername = <?php echo $row["friend"]; ?> >Remove</button>
        </div>
        <?php
    }
    ?>
<script>
    $(".removeFriendButton").on("click", function(){
        const friendUsername = $(this).attr("friendUsername");
        const currentRemoveFriendButton = $(this);
        $.post("../../friends/remove_friend.php", {friendUsername: friendUsername}, function(data){
            currentRemoveFriendButton.parent().remove();
        });
    });
</script>
