<?php

function con2SQL() {
    $con = mysqli_connect("localhost", "f14g21", "21mgrs2014");
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    //set the default client character set
    mysqli_set_charset($con, 'utf-8');
    mysqli_select_db($con, "student_f14g21");
    
    return $con;
}

function endCon2SQL($con){
    //mysqli_kill($con); //needs 2 parameters
    mysqli_close($con);
}

?>