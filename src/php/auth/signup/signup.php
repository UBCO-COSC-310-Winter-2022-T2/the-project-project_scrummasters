<?php


use Shaheershoaib\TheProjectProjectScrummasters\php\auth\signup\SignUpFormGetter;
use Shaheershoaib\TheProjectProjectScrummasters\php\auth\signup\SignUpFormInserter;


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once 'SignUpFormGetter.php';
    require_once 'SignUpFormInserter.php';
    $signUpFormGetter = new SignUpFormGetter();
    $signUpFormInserter = new SignUpFormInserter($signUpFormGetter);
    $signUpFormInserter->insert();
    header("Location: ../../../html/loginform.html");
}
else{
    echo "<p>Bad Request</p>";
}
?>