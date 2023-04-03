<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'LoginFormGetter.php';
    require_once 'LoginFormValidator.php';

    $loginFormGetter = new LoginFormGetter();
    $loginFormValidator = new LoginFormValidator($loginFormGetter);
    if($loginFormValidator->isValid())
    {
        session_start();
        $_SESSION['username'] = $loginFormGetter->getUsername();
        header('Location: ../../views/home.php');
    }
    else header('Location: ../../../html/loginform.html');


}

else {
    echo "<p> Bad Request </p>";
}
?>