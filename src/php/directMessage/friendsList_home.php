<?php
session_start();
$username = $_SESSION["username"];
require_once '../db/dbConnection.php';

$getFriendsSQL = "(SELECT username1 as friend FROM friend WHERE username2 = '$username') UNION (SELECT username2 as friend FROM friend WHERE username1 = '$username')";
$dbConnection = new dbConnection();
$friendsListResult = mysqli_query($dbConnection->getConnection(), $getFriendsSQL);

?>
<div class = "container">
    <?php
while($row = $friendsListResult->fetch_assoc())
{

    ?>
        <br>
    <button class = "friend" friendUsername = <?php echo $row["friend"]; ?>>
        <?php echo $row["friend"]; ?>
    </button>


<?php
}
?>
</div>

<style>
    .friend{
        height: 20px;
        margin-top: 20px;

    }

    .container{
        display: flex;
        flex-direction: column;
    }
</style>

<script>
    $(".friend").on("click", function(){
        const friendUsername = $(this).attr("friendUsername");
        $.post("../views/directMessagePage.php", {friendUsername: friendUsername}, function(data){
            $("#content").html(data);
        })
    })
</script>
