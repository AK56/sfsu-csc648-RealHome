<?php

/* 
 * This page will process ModelCreateEntry form into the Database then redirect to index.php
 * 
 */



session_start();

$con = mysqli_connect("localhost", "f14g21", "21mgrs2014", "student_f14g21");

if (!$con) {
    exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
//set the default client character set
mysqli_set_charset($con, 'utf-8');




//print_r($_POST);

/** Check that the page was requested from itself via the POST method. */
if ($_SERVER['REQUEST_METHOD'] == "POST") {

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

    
    $my_query = "INSERT INTO Entry (price, address, city, state, zipCode, beds, baths, propertyType, size, description) VALUES ($InputPrice,'" . $InputAddress. "','" . $InputCity. "','" . $InputState. "',$InputZipCode,$InputBeds,$InputBaths ,'" . $InputPropertyType . "', $InputSize ,'" . $InputDescription. "')";
 
    
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
// mysqli_query($con, $my_query);

    /* Handle file upload */
if ($InputEntryToDelete){
    $my_query = "DELETE FROM Entry WHERE id=$InputEntryToDelete";
} else if($InputEntryToEdit){
    $my_query = "UPDATE Entry SET price = $InputPrice, address = '" .$InputAddress. "' , city = '" .$InputCity. "' , state = '" .$InputState. "' , zipCode = $InputZipCode , beds = $InputBeds ,baths = $InputBaths , propertyType = '" .$InputPropertyType. "' , size = $InputSize, description = '" .$InputDescription. "'  WHERE id = $InputEntryToEdit";
}


    /* Redirect browser */
    header("Location: ../index.php");

    /* Make sure that code below does not get executed when we redirect. */
    exit;
}

mysqli_close($con);

?>

