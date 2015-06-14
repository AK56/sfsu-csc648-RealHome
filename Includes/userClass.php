<?php

require_once 'ManageAccount/prepare.php';

class User {

    private $id;
    private $username;
    private $password;
    private $phone;
    private $email;
    private $firstName;
    private $lastName;
    private $Permissions;
    private $watchedEntries;
    private $photo;

    /////////////// constructor and destructor funciotns 
//    function __construct() {
//        print "In User class constructor\n";
//    }
    /////////////// getter funciotns usually harmless, 
    // no password getter for security reasons.

    function get_id() {
        return $this->id;
    }

    function get_username() {
        return $this->username;
    }

    function get_phone() {
        return $this->phone;
    }

    function get_email() {
        return $this->email;
    }

    function get_firstName() {
        return $this->firstName;
    }

    function get_lastName() {
        return $this->lastName;
    }

    function get_Permissions() {
        return $this->Permissions;
    }

    function get_watchedEntries() {
        return $this->watchedEntries;
    }

    function get_photo() {
        return $this->photo;
    }

    ////////////////// setter functions
    // this will need to be more secure, id is provided by table and so 
    // id must not have setter. Email is critical not sure if it needs to be 
    // changable.

    protected function set_username($new_user) {
        return $this->username = $new_user;
    }

    protected function set_phone($new_phone) {
        return $this->phone = $new_phone;
    }

    protected function set_email($new_email) {
        return $this->email = $new_email;
    }

    protected function set_firstName($new_first) {
        return $this->firstName = $new_first;
    }

    protected function set_lastName($new_last) {
        return $this->lastName = $new_last;
    }

    protected function set_Permissions($new_perm) {
        return $this->Permissions = $new_perm;
    }

    // this needs to be modified, so adding and substracting 
    protected function set_watchedEntries($new_watch) {
        return $this->watchedEntries = $new_watch;
    }

    protected function set_photo($new_photo) {
        return $this->photo = $new_photo;
    }

    public function getUserInfo() {
        // connection to database
        $conn = connect2SQL();
        //
        //
        if (isset($_SESSION["email"])) {
            $email = $_SESSION["email"];
        } else {
            $email = "needsToLogin";
        }
// change permission if needed 
        $sql = "SELECT * FROM `User` WHERE email = \"$email\" ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
// new object User
                $usr = new User();
                //
                $usr->id = $row["id"];
                $usr->username = $row["username"];
                $usr->phone = $row["phone"];
                $usr->email = $row["email"];
                $usr->firstName = $row["firstName"];
                $usr->lastName = $row["lastName"];
                $usr->Permissions = $row["Permissions"];
                $usr->watchedEntries = $row["watchedEntries"];
                $usr->photo = $row["photo"];
            }
        }
        endConnection($conn);
        return $usr;
    }

    public function getRealtorsInfo() {
//        new array that will hold all results 
        $array = array();

// connection to database
        $conn = connect2SQL();

// change permission if needed 
        $sql = "SELECT * FROM `User` WHERE Permissions >= 1 ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {

// output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
// new object User
                $usr = new User();
                $usr->id = $row["id"];
                $usr->username = $row["username"];
                $usr->phone = $row["phone"];
                $usr->email = $row["email"];
                $usr->firstName = $row["firstName"];
                $usr->lastName = $row["lastName"];
                $usr->Permissions = $row["Permissions"];
                $usr->watchedEntries = $row["watchedEntries"];
                $usr->photo = $row["photo"];


// trying to push new user in every iteration
                array_push($array, $usr);
            }
        } else {
            echo "failedToDetect";
            return false;
        }
        endConnection($conn);
        return $array;
    }

}

//class Realtor extends User {
//
//    function __construct() {
//        parent::__construct();
//        echo "In SubClass Realtor constructor <br>";
//    }
//
//}

// folowing is steting functions can be delteted
function test_getRealtorsInfo() {
// following is testing if getRealtorsInfo function is working
    $usr = new User();
//    $array = array();
    $array = $usr->getRealtorsInfo();
//$usr2->getRealtorsInfo();
// show the final variables
    echo "final variables are: <br>";

    var_dump($array);
}

function test_constructor() {
// following is testing if constructorsare working
    $usr = new User();
    echo "<br>";
    $rltr = new Realtor();
    echo "<br>";
    var_dump($rltr->get_Permissions());
}

?>