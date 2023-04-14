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
    /*ul {*/
    /*    list-style-type: none;*/
    /*    margin: 0;*/
    /*    padding: 0;*/
    /*    overflow: hidden;*/
    /*    border: 3px solid #171a1c;*/
    /*    background-color: #23272a;*/
    /*}*/

    /*li {*/
    /*    float: left;*/
    /*}*/

    /*li a {*/
    /*    display: block;*/
    /*    color: white;*/
    /*    text-align: center;*/
    /*    padding: 14px 16px;*/
    /*    text-decoration: none;*/
    /*}*/

    /*li a:hover:not(.active) {*/
    /*    background-color: #ddd;*/
    /*}*/

    /*li a.active {*/
    /*    color: white;*/
    /*    background-color: #04AA6D;*/
    /*}*/
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
        overflow: hidden;
        background-color: #333;
    }

    .navbar a {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .dropdown {
        float: left;
        overflow: hidden;
    }

    .dropdown .dropbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .navbar a:hover, .dropdown:hover .dropbtn {
        background-color: red;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<div class="navbar">
    <a class="nav-link" <?php if ($currentPage == "home.php") { echo('href="home.php"'); } else{ echo('href="../../views/home.php"');}?> >Home</a>
    <a class="nav-link" <?php if ($currentPage == "friends.php") { echo('href="friends.php"'); } else{ echo('href="../views/friends/friends.php"');}?> >Friends</a>
    <div class="dropdown">
        <button class="dropbtn">Server v
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a class="nav-link" <?php if ($currentPage == "friends.php") { echo('href="../../views/newserver.php"'); } else{ echo('href="../views/newserver.php"');}?> >Create Server</a>

        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Account v
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a class="nav-link" <?php if ($currentPage == "friends.php") { echo('href="../../views/account/account.php"'); } else{ echo('href="../views/account/account.php"');}?> >Edit Account</a>
            <a class="nav-link" <?php if ($currentPage == "friends.php") { echo('href="../../auth/login/logout.php"'); } else{ echo('href="../auth/login/logout.php"');}?> >logOutTRY</a>
        </div>
    </div>
</div>





