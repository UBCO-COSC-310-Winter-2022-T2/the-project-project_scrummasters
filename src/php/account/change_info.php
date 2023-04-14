<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once 'InfoChanger.php';
if($_SERVER["REQUEST_METHOD"] != "POST")
{
    header("Location: ../../html/badrequest.html");
    exit();
}



$_SESSION["param"] = $_POST["param"];
$_SESSION["value"] = $_POST["value"];
$_SESSION["password"] = md5($_POST["password"]);



$infoChanger = new InfoChanger();

if(!$infoChanger->confirmPassword()) {
    echo "<p style = \"color: red\" > Sorry, but the password was not correct. Please try again.</p>";

    unset ($_SESSION["param"]);
    unset ($_SESSION["value"]);
    unset ($_SESSION["password"]);
    exit();
    }


if( $_SESSION["param"] == "email" || $_SESSION["param"] == "username" || $_SESSION["param"] == "phoneNumber" ) {
    if ($infoChanger->isInfoUnique()) {
        $infoChanger->changeInfo();
        if($_SESSION["param"] == "username")
            $_SESSION["username"] = $_SESSION["value"];
    }

    else{
        $kind = strtolower($_POST["kind"]);
        unset ($_SESSION["param"]);
        unset ($_SESSION["value"]);
        unset ($_SESSION["password"]);
        echo "<p style = \"color: red\" > The {$kind} you entered was not unique. Please try again.</p>";
        exit();
    }
}

else $infoChanger->changeInfo();

unset($_SESSION["param"]);
unset($_SESSION["value"]);
unset ($_SESSION["password"]);
?>





