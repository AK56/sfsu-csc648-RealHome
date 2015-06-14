<?php

/*
 * this file will hold the needed functions for the modal like the queries
 * needs to close the connection properly
 * this file can be generalized to be class for user.
 */

function connect2SQL() {
    $conn = mysqli_connect("localhost", "f14g21", "21mgrs2014");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //set the default client character set
    mysqli_set_charset($conn, 'utf-8');
    mysqli_select_db($conn, "student_f14g21");

    return $conn;
}

function endConnection($conn) {
    mysqli_close($conn);
//    $conn = NULL;
}

// hradcoded for now
function getEmail() {

    $email = "NotReadYet";
    
    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
    } else {
        $email = "needsToLogin";
    }
    //var_dump($_SESSION["email"]);
    return $email;
}

function getPermissioin($email) {
    // this function will return the permission number of the provided email 
    $permission = "NotReadYet";
    $conn = connect2SQL();
    $sql = "SELECT Permissions FROM `User` WHERE email = \"$email\" ";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $permission = $row["Permissions"];
        }
    } else {
        $permission = "failedToDetect";
    }

    endConnection($conn);
    return $permission;
}

function getPhone($email) {
    // this function will return the phone number of the provided email 
    $phone = "NotReadYet";
    $conn = connect2SQL();
    $sql = "SELECT phone FROM `User` WHERE email = \"$email\" ";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $phone = $row["phone"];
        }
    } else {
        $phone = "failedToDetect";
    }

    endConnection($conn);
    return $phone;
}

function getName($email) {
    // this function will return the first name of the provided email 
    $name = "nameNotReadYet";
    $conn = connect2SQL();
    $sql = "SELECT firstName FROM `User` WHERE email = \"$email\" ";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["firstName"];
        }
    } else {
        $name = "failedToDetect";
    }

    endConnection($conn);
    return $name;
}

?>
