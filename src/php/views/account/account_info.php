<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../../account/AccountInfoGetter.php';

$accountInfoGetter = new AccountInfoGetter();
?>

<h1> My Account Information</h1>
<table>
    <tr>
        <td> <h2> First Name: </h2> <td>
        <td> <h2>  <?php echo $accountInfoGetter->getFirstName(); ?> </h2> </td>
    </tr>

    <tr>
        <td> <h2> Last Name: </h2> <td>
        <td> <h2> <?php echo $accountInfoGetter->getLastName(); ?> </h2> </td>
    </tr>

    <tr>
        <td> <h2> Email Address: </h2> <td>
        <td> <h2> <?php echo $accountInfoGetter->getEmail(); ?> </h2> </td>
    </tr>

    <tr>
        <td> <h2>PhoneNumber:<h2> <td>
        <td> <h2><?php echo $accountInfoGetter->getPhoneNumber(); ?> </h2></td>
    </tr>
</table>

