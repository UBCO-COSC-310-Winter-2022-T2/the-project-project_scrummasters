<?php


session_start();

class AccountInfoGetter
{
    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $phoneNumber;
    private $dbConnection;
    private $connection;

    public function __construct()
    {
        require_once('../../db/dbConnection.php');

        $this->dbConnection = new dbConnection();
        $this->connection = $this->dbConnection->getConnection();
        $this->username = $_SESSION["username"];

        $sql = "SELECT * FROM discordUser WHERE username = '$this->username'";
        $result = mysqli_query($this->connection, $sql);

        if ($row = $result->fetch_assoc()) {
            $this->firstName = $row["firstName"];
            $this->lastName = $row["lastName"];
            $this->email = $row["email"];
            $this->phoneNumber = $row["phoneNumber"];
        }

    }

    /**
     * @return mixed
     */
    public function getFirstName(): mixed
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName(): mixed
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getUsername(): mixed
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail(): mixed
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber(): mixed
    {
        return $this->phoneNumber;
    }


}

?>