

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <style>

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>


<h1>Change My Name</h1>


    <label>New First Name:</label>
    <br>
    <input type = "text" id = "newFirstName" name = "newFirstName" placeholder = "Enter new first name..." >
    <br>
    <label>New Last Name:</label>
    <br>
    <input type = "text" id = "newLastName" name = "newLastName" placeholder="Enter new last name...">
    <br>
    <button id = "submit-name-change" link = "../../account/change_name.php">Change Name</button>

</body>



</html>

<script >
    $("#submit-name-change").on("click", function(){
        const link = $(this).attr("link");
        const newFirstName = $("#newFirstName").val();
        const newLastName = $("#newLastName").val();
        $.post(link, {newFirstName: newFirstName, newLastName: newLastName}, function(data){
           alert("Name changed!");
        });
    });
</script>


