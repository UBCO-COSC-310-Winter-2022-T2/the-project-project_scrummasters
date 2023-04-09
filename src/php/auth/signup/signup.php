<?php




if($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'SignUpFormGetter.php';
    require_once 'SignUpFormInserter.php';
    $signUpFormGetter = new SignUpFormGetter();
    $signUpFormInserter = new SignUpFormInserter($signUpFormGetter);
    $signUpFormInserter->insert();
    header("Location: ../../views/loginform.php");
}
else{
    echo "<p>Bad Request</p>";
}
?>