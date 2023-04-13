<?php
require_once('../db/dbConnection.php');


Class ServerCreator{
    public static function add_server()
    {
        session_start();
        $dbConnection =  new dbConnection();
        $user_name = $_SESSION["username"];
        $server_name = $_POST["serverName"];
        $sql = "INSERT INTO discordserver(adminUsername, serverName) VALUES('$user_name','$server_name')";
        $result = mysqli_query($dbConnection->getConnection(), $sql);
    }
    public static function is_taken(){
        $dbConnection =  new dbConnection();
        $server_name = $_POST["serverName"];
        $sql = "SELECT serverName FROM discordserver WHERE serverName = '$server_name'";
        $result = mysqli_query($dbConnection->getConnection(), $sql);

        if($row = mysqli_fetch_assoc($result))
        {
            session_start();
            $_SESSION["server_err"] = $server_name;
            return true;
        }
        return false;
    }




}