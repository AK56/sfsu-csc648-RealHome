<?php

/* 
 * This page will process ModelCreateEntry form into the Database then redirect to index.php
 * 
 */

session_start();



define("ROOT_PATH", "/home/f14g21/public_html" . "/");
define("BASE_URL", "/");
define("DB_HOST", "localhost");
define("DB_NAME", "student_f14g21");
define("DB_PORT", "8889"); // default: 3306
define("DB_USER", "f14g21");
define("DB_PASS", "21mgrs2014");

$servername = "sfsuswe.com";
$username = "f14g21";
$password = "21mgrs2014";
$dbname = "student_f14g21";

$con = mysqli_connect("localhost", "f14g21", "21mgrs2014", "student_f14g21");

if (!$con) {
    exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
//set the default client character set
mysqli_set_charset($con, 'utf-8');

/** Check that the page was requested from itself via the POST method. */
//This doesn't get used from Create anymore, only Edit and Delete
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_SESSION["id"]))
    {
        
        $userID = $_SESSION["id"];
        echo $userID;
    } else {
        echo " Not set ";
    }

    $InputPrice = $_POST['InputPrice'];
    $InputAddress = $_POST['InputAdress'];
    $InputCity = $_POST['InputCity'];
    $InputState = $_POST['InputState'];
    $InputZipCode = $_POST['InputZipCode'];
    $InputBeds = $_POST['InputBeds'];
    $InputBaths = $_POST['InputBaths'];
    $InputPropertyType = $_POST['InputPropertyType'];
    $InputSize = $_POST['InputSize'];
    $InputDescription = $_POST['InputDescription'];

    $InputEntryToDelete = $_POST['InputEntryToDelete'];
    $InputEntryToEdit = $_POST['InputEntryToEdit'];
    
    $SellFirstName = $_POST['SellFirstName'];
    $SellLastName = $_POST['SellLastName'];
    $SellEmail = $_POST['SellEmail'];
    $SellPhone = $_POST['SellPhone'];
    $SellAddress = $_POST['SellAddress'];
    $SellZipCode = $_POST['SellZipCode'];
    $SellNote = $_POST['SellNote'];
    
       
      if ($_FILES["image"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $_FILES["image"]["name"]);
        $image = "images/".$_FILES["image"]["name"];
    }


    $my_query = "INSERT INTO Entry (price, address, city, state, zipCode, beds, baths, propertyType, size, description, creatorID, photo) VALUES ($InputPrice,'" . $InputAddress . "','" . $InputCity . "','" . $InputState . "',$InputZipCode,$InputBeds,$InputBaths ,'" . $InputPropertyType . "', $InputSize ,'" . $InputDescription . "', $userID, '$image')";


    $_SESSION['InputPrice'] = $InputPrice;
    $_SESSION['InputAddress'] = $InputAddress;
    $_SESSION['InputCity'] = $InputCity;
    $_SESSION['InputState'] = $InputState;
    $_SESSION['InputZipCode'] = $InputZipCode;
    $_SESSION['InputBeds'] = $InputBeds;
    $_SESSION['InputBaths'] = $InputBaths;
    $_SESSION['InputPropertyType'] = $InputPropertyType;
    $_SESSION['InputSize'] = $InputSize;
    $_SESSION['InputDescription'] = $InputDescription;
    $_SESSION['InputEntryToDelete'] = $InputEntryToDelete;
    $_SESSION['InputEntryToEdit'] = $InputEntryToEdit;
    
    $_SESSION['SellFirstName'] = $SellFirstName;
    $_SESSION['SellLastName'] = $SellLastName;
    $_SESSION['SellEmail'] = $SellEmail;
    $_SESSION['SellPhone'] = $SellPhone;
    $_SESSION['SellAddress'] = $SellAddress;
    $_SESSION['SellZipCode'] = $SellZipCode;
    $_SESSION['SellNote'] = $SellNote;
// mysqli_query($con, $my_query);

    /* Handle file upload */
    if ($InputEntryToDelete) {
        $my_query = "DELETE FROM Entry WHERE id=$InputEntryToDelete";
    } else if ($InputEntryToEdit) {
        $my_query = "UPDATE Entry SET price = $InputPrice, address = '" . $InputAddress . "' , city = '" . $InputCity . "' , state = '" . $InputState . "' , zipCode = $InputZipCode , beds = $InputBeds ,baths = $InputBaths , propertyType = '" . $InputPropertyType . "' , size = $InputSize, description = '" . $InputDescription . "'  WHERE id = $InputEntryToEdit";
    }

    if ($con->query($my_query) === TRUE) {
        echo 'users entry saved successfully';
    } else {
        echo 'Error: ' . $con->error;
    }

    /* Redirect browser */
    echo " Finished now check!"; //Use this when testing
    header("Location: ../index.php?x=4");

    /* Make sure that code below does not get executed when we redirect. */
    exit;
}

mysqli_close($con);

?>

