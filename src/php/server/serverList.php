<style>


    .vertical-menu li {
        background-color: #23272a;
        color: black;
        display: block;
        margin: 5px;
        padding: 20px;
        text-decoration: none;
    }

    button {
        border-radius: 50%;
        background-color: #04AA6D;
        border: none;
        color: white;

        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    button:hover{
        cursor: pointer;
    }

    .leaveServer{
        background-color: red;
    }
    .vertical-menu li:hover {
        background-color: #ccc;
    }

    .vertical-menu form{
        display: inline;
    }

    .inviteLink{
        background-color: orange;
    }

</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php


// Connect to your MySQL database

if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
if(empty($_SESSION["username"]))
{
    header("Location: ../views/loginform.php");
    exit();
}

require_once('../db/dbConnection.php');
$username = $_SESSION['username'];
$dbConnection = new dbConnection();
$connection = $dbConnection->getConnection();

//get userID


// Query your database
$sql = "SELECT * FROM userInServer JOIN discordServer USING(serverID) WHERE username = \"$username\"";


$result = mysqli_query($connection, $sql);



// Check if result exists and has rows
echo ('<div class="vertical-menu">');
echo("<ul>");
if ($result && $result->num_rows > 0) {
    // Loop through each row in the result
    while ($row = $result->fetch_assoc()) {
        $isAdmin = false;
        // Get the value of the column you want to use for the link
        $serverID = $row['serverID'];
        $sql2 = "SELECT * FROM discordServer WHERE serverID=$serverID";
        $result2 = mysqli_query($connection, $sql2);
        $row2 = $result2->fetch_assoc();
        if($row2['adminUsername'] == $username){$isAdmin = true;}

        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
        $domain = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['REQUEST_URI'];
        $dir = dirname($path);

        $current_directory_url = $protocol . "://" . $domain . $dir . (substr($dir, -1) == '/' ? '' : '/')."joinServer.php?serverID=".$serverID;

        // Create the link using the value
?>

     <li>

         <button class = "inviteLink" link = " <?php echo $current_directory_url; ?> ">Invite Link</button>
         <button class = "server" serverID = <?php echo $serverID; ?>> <?php echo $row["serverName"]; ?> </button>

         <form method = "post" action = "../server/leaveServer.php">
             <input type = "hidden" name = "serverID" value = "<?php echo $serverID; ?>" >
         <button class = "leaveServer">Leave</button>
         </form>

             <?php

             if($isAdmin==true){
                 echo '<form method = "post" action = "../server/deleteServer.php">';
                 echo '<input type = "hidden" name = "deleteServerID" value = "'. $serverID .'">';
                 echo '<button class = "leaveServer"> Delete Server</button>';

             }
             ?>
         </form>
     </li>

<?php
    }


    // Free the result set
    $result->free();
} else {
    echo "You are currently not in any server";
}
echo("</ul></div>");

// Close the database connection

?>

<script>

    $(".server").on("click", function(){
    const serverID = $(this).attr("serverID");
    $.get("../views/serverPage.php", {serverID: serverID}, function(data){
        $("#content").html(data);
    });
    });

    $(".inviteLink").on("click", function(){
        const link = $(this).attr("link");
        const tempElement = $("<textarea>");
        $("body").append(tempElement);
        tempElement.val(link).select();
        document.execCommand('copy');
        alert("Link copied to clipboard")

    })


</script>


