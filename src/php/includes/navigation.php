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
        font-family: Arial, Helvetica, sans-serif !important;
    }

    .navbar {
        overflow: hidden !important;
        background-color: #333 !important;
    }

    .navbar a {
        float: left !important;
        font-size: 16px !important;
        color: white !important;
        text-align: center !important;
        padding: 14px 16px !important;
        text-decoration: none !important;
    }

    .dropdown {
        float: left !important;
        overflow: hidden !important;
    }

    .dropdown .dropbtn {
        font-size: 16px !important;
        border: none !important;
        outline: none !important;
        color: white !important;
        padding: 14px 16px !important;
        background-color: inherit !important;
        font-family: inherit !important;
        margin: 0 !important;
    }

    .navbar a:hover, .dropdown:hover .dropbtn {
        background-color: red !important;
    }

    .dropdown-content {
        display: none !important;
        position: absolute !important;
        background-color: #f9f9f9 !important;
        min-width: 160px !important;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2) !important;
        z-index: 1 !important;
    }

    .dropdown-content a {
        float: none !important;
        color: black !important;
        padding: 12px 16px !important;
        text-decoration: none !important;
        display: block !important;
        text-align: left !important;
    }

    .dropdown-content a:hover {
        background-color: #ddd !important;
    }

    .dropdown:hover .dropdown-content {
        display: block !important;
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
            <a class="nav-link" <?php if ($currentPage == "friends.php") { echo('href="../../auth/login/logout.php"'); } else{ echo('href="../auth/login/logout.php"');}?> >Log Out</a>
        </div>
    </div>
</div>





