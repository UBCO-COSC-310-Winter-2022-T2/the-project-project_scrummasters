<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../../html/homepage.html");
die();