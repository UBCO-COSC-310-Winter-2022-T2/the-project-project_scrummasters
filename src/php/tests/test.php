<?php
use PHPUnit\Framework\TestCase;
require_once('../db/dbConnection.php');



class phpUnitTest extends TestCase
{
    private $dbConnection;

    //setup create
    protected function setUp(): void
    {
        //add test user to the discordUser table
        $_POST['test']='testing';
        $this->dbConnection = new dbConnection();
        session_start();
        session_destroy();
        session_start();
        $sql = "INSERT INTO discordUser(firstName, lastName, email, phoneNumber, username, password) VALUES('test', 'test','test@gmail.com','0123456789','testing','test')";
        $_SESSION["username"] = "testing";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);
    }

    protected function tearDown(): void
    {
        //deleting test user from table discordUser
        $sqldown = "DELETE FROM discordUser WHERE username='testing'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sqldown);

        unset($_POST['username']);
        unset($_POST['password']);
        unset($_POST['email']);
        unset($_POST['phoneNumber']);
        unset($_POST['firstName']);
        unset($_POST['lastName']);
        session_start();
        session_destroy();
        $_POST['test'] = null;

        //deleteUserFromDatabase

    }

    //tearDown delete


    public function testRegistrationNew(){
        $bool = false;
        $_POST['username'] = 'testRegistration';
        $_POST['password'] = 'testRegistration';
        $_POST['email'] = 'testRegistration@gmail.com';
        $_POST['phoneNumber'] = '246813579';
        $_POST['firstName'] = 'testRegistration';
        $_POST['lastName'] = 'testRegistration';

        require_once('../auth/signup/SignUpFormGetter.php');
        require_once('../auth/signup/SignUpFormInserter.php');

        $signUpFormGetter = new SignUpFormGetter();
        $signUpFormInserter = new SignUpFormInserter($signUpFormGetter);
        $signUpFormInserter->insert();



        $sql = "SELECT username FROM discordUser WHERE username = 'testRegistration'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

        $sql2 = "DELETE FROM discordUser WHERE username = 'testRegistration'";
        $result2 = mysqli_query($this->dbConnection->getConnection(), $sql2);

        if($row = mysqli_fetch_assoc($result))
        {
            $bool = true;
        }
        self::assertTrue($bool);
    }


    public function testChangeFirstName()
    {
        require_once '../account/InfoChanger.php';

        session_start();
        $_SESSION["param"] = "firstName";
        $_SESSION["value"] = "testNew";
        $infoChanger = new InfoChanger();
        $_SESSION["password"] = md5("test");

        self::assertTrue($infoChanger->changeInfo());
    }

    public function testChangeLastName()
    {
        require_once '../account/InfoChanger.php';

        session_start();
        $_SESSION["param"] = "lastName";
        $_SESSION["value"] = "testNew";
        $infoChanger = new InfoChanger();
        $_SESSION["password"] = md5("test");

        self::assertTrue($infoChanger->changeInfo());
    }

    public function testChangeUsername()
    {
        require_once '../account/InfoChanger.php';

        session_start();
        $_SESSION["param"] = "username";
        $_SESSION["value"] = "testNew";
        $infoChanger = new InfoChanger();
        $_SESSION["password"] = md5("test");
        $bool = $infoChanger->changeInfo();
        mysqli_query($this->dbConnection->getConnection(), "DELETE FROM discordUser WHERE username = \"testNew\"");
        self::assertTrue($bool);
    }

    public function testChangeEmailAddress()
    {
        require_once '../account/InfoChanger.php';

        session_start();
        $_SESSION["param"] = "email";
        $_SESSION["value"] = "testNew@test.com";
        $infoChanger = new InfoChanger();
        $_SESSION["password"] = md5("test");

        self::assertTrue($infoChanger->changeInfo());
    }

    public function testChangePhoneNumber()
    {
        require_once '../account/InfoChanger.php';

        session_start();
        $_SESSION["param"] = "phoneNumber";
        $_SESSION["value"] = "101011011";
        $infoChanger = new InfoChanger();
        $_SESSION["password"] = md5("test");

        self::assertTrue($infoChanger->changeInfo());
    }

    public function testChangePassword()
    {
        require_once '../account/PasswordChanger.php';

        session_start();
        $_SESSION["newPassword"] = "testNew";
        $_SESSION["oldPassword"] = "test";

        $passwordChanger = new PasswordChanger();
        self::assertTrue($passwordChanger->changePassword());

    }

    public function testSimpleTrue()
    {
        $this->assertTrue(true);
    }
    public function testCreateServer()
    {
        require_once '../server/ServerCreator.php';
        $_POST["serverName"] = "testServer";

        $serverCreator = new ServerCreator();
        $server_id = $serverCreator::add_server();


        $this->assertTrue($server_id != null && $server_id!= '');
    }

    public function testLeaveServer()
    {
        require_once '../server/ServerCreator.php';
        $_POST["serverName"] = "testServer";
        $serverCreator = new ServerCreator();
        $server_id = $serverCreator::add_server();

        require_once '../server/ServerLeaver.php';
        $serverLeaver = new ServerLeaver();
        $_SESSION["serverID"] = $server_id;
        $this->assertTrue($serverLeaver->leaveServer());

    }


    public function testAcceptFriendRequest()
    {
       $friendSQL =  "INSERT INTO discordUser(firstName, lastName, email, phoneNumber, username, password) VALUES('test2', 'test2','test2@gmail.com','01234567892','testing2','test2')";
       mysqli_query($this->dbConnection->getConnection(), $friendSQL);

        $friendRequestSQL = "INSERT INTO friendRequest(username1, username2) VALUES ('testing2', 'testing')";
       mysqli_query($this->dbConnection->getConnection(), $friendRequestSQL);

       require_once '../friends/FriendRequestHandler.php';
       $_SESSION["friendRequestUsername"] = "testing2";
       $frh = new FriendRequestHandler();
       $bool = $frh->acceptFriendRequest();

       $del = "DELETE FROM discordUser WHERE username = 'testing2'";
       mysqli_query($this->dbConnection->getConnection(), $del);

       $this->assertTrue($bool);

    }

    public function testDeclineFriendRequest()
    {
        $friendSQL =  "INSERT INTO discordUser(firstName, lastName, email, phoneNumber, username, password) VALUES('test2', 'test2','test2@gmail.com','01234567892','testing2','test2')";
        mysqli_query($this->dbConnection->getConnection(), $friendSQL);

        $friendRequestSQL = "INSERT INTO friendRequest(username1, username2) VALUES ('testing2', 'testing')";
        mysqli_query($this->dbConnection->getConnection(), $friendRequestSQL);

        require_once '../friends/FriendRequestHandler.php';
        $_SESSION["friendRequestUsername"] = "testing2";
        $frh = new FriendRequestHandler();
        $bool = $frh->declineFriendRequest();

        $del = "DELETE FROM discordUser WHERE username = 'testing2'";
        mysqli_query($this->dbConnection->getConnection(), $del);

        $this->assertTrue($bool);
    }

    public function testCancellingFriendRequest()
    {
        $friendSQL =  "INSERT INTO discordUser(firstName, lastName, email, phoneNumber, username, password) VALUES('test2', 'test2','test2@gmail.com','01234567892','testing2','test2')";
        mysqli_query($this->dbConnection->getConnection(), $friendSQL);

        $friendRequestSQL = "INSERT INTO friendRequest(username1, username2) VALUES ('testing', 'testing2')";
        mysqli_query($this->dbConnection->getConnection(), $friendRequestSQL);

        require_once '../friends/FriendRequestCanceller.php';
        $_SESSION["friendRequestUsername"] = "testing2";
        $frc= new FriendRequestCanceller();
        $bool = $frc->cancelFriendRequest();

        $del = "DELETE FROM discordUser WHERE username = 'testing2'";
        mysqli_query($this->dbConnection->getConnection(), $del);

        $this->assertTrue($bool);
    }

    public function testSendingDirectMessage()
    {
        $friendSQL =  "INSERT INTO discordUser(firstName, lastName, email, phoneNumber, username, password) VALUES('test2', 'test2','test2@gmail.com','01234567892','testing2','test2')";
        mysqli_query($this->dbConnection->getConnection(), $friendSQL);

        $friendSQL = "INSERT INTO friend(username1, username2) VALUES ('testing', 'testing2')";
        mysqli_query($this->dbConnection->getConnection(), $friendSQL);

        require_once '../directMessage/DirectMessageSender.php';

        $_SESSION["friendUsername"] = "testing2";
        $_SESSION["directMessage"] = "test";
        $dms= new DirectMessageSender();
        $bool = $dms->sendMessage();

        $del = "DELETE FROM discordUser WHERE username = 'testing2'";
        mysqli_query($this->dbConnection->getConnection(), $del);

        $this->assertTrue($bool);
    }

    public function testSendingServerMessage()
    {
        require_once '../server/ServerCreator.php';
        $_POST["serverName"] = "newserver";
        $serverCreator = new ServerCreator();
        $server_id = $serverCreator::add_server();

        require_once '../server/ServerMessageSender.php';

        $_SESSION["serverID"] = $server_id;
        $_SESSION["serverMessage"] = "this is a message";
        $serverMessageSender = new ServerMessageSender();

        $bool = $serverMessageSender->sendMessage();
        $this->assertTrue($bool);

    }

    

}

?>


