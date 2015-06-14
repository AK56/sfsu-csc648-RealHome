<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_SESSION['id']))
{
    echo " ID IS SET ";
    $userNum = $_SESSION['id'];
    echo $userNum;
}
else {
    echo " Not Set ";
}

echo '<script> console.log("Inside ProcessAddFavorites"); </script>';
$con = mysqli_connect("localhost", "f14g21", "21mgrs2014", "student_f14g21");

if (!$con) {
    exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
//set the default client character set
mysqli_set_charset($con, 'utf-8');

//mysql_connect("localhost","root","");
//mysqli_select_db("student_f14g21");

error_reporting(E_ALL && ~E_NOTICE);
if(isset($_GET["id"]))
{
    echo " GET ";
} else {
    echo " (Not getting id) ";
}
$eID = $_GET["id"];
echo " Printing id: ";
echo $eID;
$eID =5;

$sql="UPDATE User SET watchedEntries = $eID WHERE id = $userNum ";
$result = mysqli_query($con, $sql);
var_dump($result);

if($result){
echo "You have been successfully subscribed.";
}
 if(!$sql)
die(mysql_error());

mysql_close();