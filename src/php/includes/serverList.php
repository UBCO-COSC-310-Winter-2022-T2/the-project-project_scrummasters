<style>
    .vertical-menu {
        width: 100px;
    }

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

    .vertical-menu li:hover {
        background-color: #ccc;
    }

</style>
<?php


// Connect to your MySQL database

if(empty($_SESSION["username"]))
{
    header("Location: ../loginform.php");
    exit();
}

require_once('../db/dbConnection.php');
$username = $_SESSION['username'];
$dbConnection = new dbConnection();
$connection = $dbConnection->getConnection();

//get userID


// Query your database
$sql = "SELECT * FROM userinserver WHERE username = \"$username\"";

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

        echo '<li><a href="../views/serverPage.php?serverID='.$linkValue.' " target="_self"><button>'.$linkValue.'</button></a></li>';
    }

    // Free the result set
    $result->free();
} else {
    echo "No results found.";
}
echo("</ul></div>");

// Close the database connection

?>
</body>
</html>

