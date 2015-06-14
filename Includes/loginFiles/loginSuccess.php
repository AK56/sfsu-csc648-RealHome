
<?php
//This page is used to test the session only!
//Meaning this for Education purpose only currently - Steve


session_start();
if( !isset($_SESSION["email"]) ){
  echo "FAILED to get session";  
//header("location:index.php");
}
else{
    echo "You must be logged in!";
    echo $_SESSION['email'];
    echo " space ";
    echo "Print username: ";
    $myusername = $_SESSION['email'];
    var_dump($myusername);
    echo "\n Print pw: ";
    $mypassword = $_SESSION['password'];
    var_dump($mypassword);
    echo "\n Print per#: ";
    $permissionNum = $_SESSION['permission'];
    var_dump($permissionNum);
}
?>
