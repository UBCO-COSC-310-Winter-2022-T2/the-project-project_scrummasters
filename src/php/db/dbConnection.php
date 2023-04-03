<?php


class dbConnection
{

    private $host;
    private $database;
    private $user;
    private $password;
    private $connection;

    public function __construct()
    {
        $this->host = "localhost";
        $this->database = "discord";
        $this->user = "root";
        $this->password = "";

        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            $output = "<p>Unable to connect to database!</p>";
            exit($output);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }


}


?>
