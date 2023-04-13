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

    .vertical-menu li:hover {
        background-color: #ccc;
    }

</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php


// Connect to your MySQL database

session_start();
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
        // Get the value of the column you want to use for the link
        $linkValue = $row['serverID'];


        // Create the link using the value
?>

     <li><button serverID = <?php echo $linkValue; ?>> <?php echo $row["serverName"]; ?> </button></a></li>
<?php
    }


    // Free the result set
    $result->free();
} else {
    echo "No results found.";
}
echo("</ul></div>");

// Close the database connection

?>

<script>

    $("button").on("click", function(){
    const serverID = $(this).attr("serverID");
    $.get("../views/serverPage.php", {serverID: serverID}, function(data){
        $("#content").html(data);
    });
    });
</script>


