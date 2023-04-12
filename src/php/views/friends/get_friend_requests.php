<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php

session_start();
if(empty($_SESSION["username"]))
{
    header("Location: ../loginform.php");
    exit();
}


require_once '../../friends/FriendRequestsGetter.php';
$friendRequestsGetter = new FriendRequestsGetter();
$result = $friendRequestsGetter->getFriendRequests();
?>

<?php
while($row = $result->fetch_assoc())
{
    ?>
    <div class = "friendRequest">
        <h2><?php echo $row["friendRequest"]; ?> </h2>
        <div class = "buttons">
            <button class = "declineFriendRequestButton" friendRequestUsername = <?php echo $row["friendRequest"]; ?> >Decline</button>
        <button class = "acceptFriendRequestButton" friendRequestUsername = <?php echo $row["friendRequest"]; ?> >Accept</button>
        </div>
    </div>
    <?php
}
?>
<script>
    $(".acceptFriendRequestButton").on("click", function(){
        const friendRequestUsername = $(this).attr("friendRequestUsername");
        console.log(friendRequestUsername);
        const currentAcceptFriendRequestButton = $(this);
        $.post("../../friends/accept_friend_request.php", {friendRequestUsername: friendRequestUsername}, function(data){
            currentAcceptFriendRequestButton.parent().parent().remove();
        });
    });

    $(".declineFriendRequestButton").on("click", function(){
        const friendRequestUsername = $(this).attr("friendRequestUsername");
        const currentdeclineFriendRequestButton = $(this);
        $.post("../../friends/decline_friend_request.php", {friendRequestUsername: friendRequestUsername}, function(data){
            currentdeclineFriendRequestButton.parent().parent().remove();
        });
    });

</script>
