<?php


require_once 'AccountInfoGetter.php';

$accountInfoGetter = new AccountInfoGetter();
?>

<h1 style = "text-align: center; font-size: 75px;">My Account Information</h1>
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

