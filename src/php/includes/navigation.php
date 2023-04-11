<?php
switch ($_SERVER["SCRIPT_NAME"]) {
    case "/Githubrepos/the-project-project_scrummasters/src/php/views/home.php":
        $CURRENT_PAGE = "Home";
        break;
    case "/Githubrepos/the-project-project_scrummasters/src/php/views/friends.php":
        $CURRENT_PAGE = "friends";
        $PAGE_TITLE = "Contact Us";
        break;
    default:
        $CURRENT_PAGE = "None";
}
?>

<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        border: 1px solid #e7e7e7;
        background-color: #f3f3f3;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: #666;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: #ddd;
    }

    li a.active {
        color: white;
        background-color: #04AA6D;
    }
</style>

<div class="container">

    <ul "nav nav-pills">
        <li class="nav-item">
            <a class="nav-link <?php if ($CURRENT_PAGE == "Home") {?>active<?php }?>" href="../views/home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($GLOBALS["CURRENT_PAGE"] == "friends") {?>active<?php }?>" href="../views/account/account.php">Friends</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($GLOBALS["CURRENT_PAGE"] == "AddFriends") {?>active<?php }?>" href="../views/account/account.php">Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($GLOBALS["CURRENT_PAGE"] == "AddFriends") {?>active<?php }?>" href="../views/home.php">Server</a>
        </li>
    </ul>
</div>


