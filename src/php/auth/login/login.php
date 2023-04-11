<?php


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
    else {
        session_start();
        $_SESSION["login_err"] = "<p style = \"color: red\">The username or password does not match. Please try again.</p>";
        header('Location: ../../views/loginform.php');
    }

}

else {

    header("Location: ../../../html/badrequest.html");
    exit();

}

?>