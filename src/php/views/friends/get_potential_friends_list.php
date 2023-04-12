<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php

session_start();
if(empty($_SESSION["username"]))
{
    header("Location: ../loginform.php");
    exit();
}


require_once '../../friends/PotentialFriendsGetter.php';
$potentialFriendsGetter = new PotentialFriendsGetter();
$result = $potentialFriendsGetter->getPotentialFriends();

require_once '../../friends/FriendRequestChecker.php';

$friendRequestChecker = new FriendRequestChecker();
?>

<?php
while($row = $result->fetch_assoc())
{

    $friendRequestAlreadyExists = $friendRequestChecker->friendRequestExists($row["potentialFriend"]);

    ?>
    <div class = "potentialFriend">
        <h2><?php echo $row["potentialFriend"]; ?> </h2>
        <div class = "buttons">
        <button class = "cancelFriendRequestButton  <?php if(!$friendRequestAlreadyExists) { ?> active <?php } ?>" potentialFriendUsername = <?php echo $row["potentialFriend"]; ?>  <?php if(!$friendRequestAlreadyExists){?> disabled <?php } ?> >Cancel Friend Request</button>
        <button class = "sendFriendRequestButton <?php if($friendRequestAlreadyExists) { ?> active <?php } ?>" potentialFriendUsername = <?php echo $row["potentialFriend"]; ?> <?php if($friendRequestAlreadyExists){?> disabled <?php } ?> > Send Friend Request </button>
        </div>

    </div>
    <?php
}
?>
<script>
    $(".cancelFriendRequestButton").on("click", function(){
        const potentialFriendUsername = $(this).attr("potentialFriendUsername");
        const currentCancelFriendRequestButton= $(this);
        $.post("../../friends/cancel_friend_request.php", {potentialFriendUsername: potentialFriendUsername}, function(data){
            currentCancelFriendRequestButton.addClass("active");
            currentCancelFriendRequestButton.prop("disabled", true);

            currentCancelFriendRequestButton.siblings(".sendFriendRequestButton").removeClass("active");
            currentCancelFriendRequestButton.siblings(".sendFriendRequestButton").prop("disabled", false);
        });
    });

    $(".sendFriendRequestButton").on("click", function(){
        const potentialFriendUsername = $(this).attr("potentialFriendUsername");
        const currentSendFriendRequestButton= $(this);
        $.post("../../friends/send_friend_request.php", {potentialFriendUsername: potentialFriendUsername}, function(data){
            currentSendFriendRequestButton.addClass("active");
            currentSendFriendRequestButton.prop("disabled", true);

            currentSendFriendRequestButton.siblings(".cancelFriendRequestButton").removeClass("active");
            currentSendFriendRequestButton.siblings(".cancelFriendRequestButton").prop("disabled", false);

        });
    });

</script>
