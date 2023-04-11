<!DOCTYPE html>
<html>
<head>
    <title>SQL Result Links</title>
</head>
<body>
<?php


// Connect to your MySQL database
session_start();


$username = $_SESSION['username'];
$dbConnection = new dbConnection();

//get userID
$sql1 = "SELECT SELECT userID FROM `discorduser` WHERE username = '$username'";
$result1 = mysqli_query($this->dbConnection->getConnection(), $sql1);
$row1 = $result1->fetch_assoc();
$userID = $row1['userID'];

// Query your database
$sql = "SELECT * FROM userinserver WHERE userID = $userID";
$result = mysqli_query($this->dbConnection->getConnection(), $sql);

// Check if result exists and has rows
if ($result && $result->num_rows > 0) {
    // Loop through each row in the result
    while ($row = $result->fetch_assoc()) {
        // Get the value of the column you want to use for the link
        $linkValue = $row['serverID'];

        // Create the link using the value
        echo "<a href='../views/server.php?serverID=32$linkValue'>" . $linkValue . "</a><br>";
    }

    // Free the result set
    $result->free();
} else {
    echo "No results found.";
}

// Close the database connection

?>
</body>
</html>

