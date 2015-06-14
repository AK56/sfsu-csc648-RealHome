<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if(isset($_POST['editRealtor']))
{
    $editNum = $_POST['editRealtor'];
    echo $editNum;
    if($editNum == 1)
    {        
        echo " Grant ";
        grantRealtor();
    } else if($editNum == 2){
        echo " Deny ";
        denyRealtor();
    } else {
        echo " no 3";
    }
} else {
    header('Location: http://sfsuswe.com/~f14g21/?x=409');
}

    function grantRealtor() {
        echo " (Inside the grantRealtor) ";
        $con = connectDB();
        if(isset($_POST['InputRealtorToEdit']))
        {
            $realtorID = $_POST['InputRealtorToEdit'];
            echo " (RealtorID set) ";
        }
        else {
            echo " (RealtorID not-set) ";
        }
        
        $my_EditRealtor_query = "UPDATE User SET Permissions = 2 WHERE id = $realtorID ";
           if ($con->query($my_EditRealtor_query) === TRUE) {
               echo 'Realtor Permission saved successfully';
                header("Location: ../index.php?x=5");
           } else {
               echo 'Error: ' . $con->error;
               header("Location: ../index.php?x=55");
           }
        
    }
    
    
    function denyRealtor() {
               echo " (Inside the denyRealtor) ";
        $con = connectDB();
        if(isset($_POST['InputRealtorToDelete']))
        {
            $realtorID = $_POST['InputRealtorToDelete'];
            echo " (RealtorID set) ";
        }
        else {
            echo " (RealtorID not-set) ";
        }
        
        $my_EditRealtor_query = "UPDATE User SET Permissions = 0 WHERE id = $realtorID ";
           if ($con->query($my_EditRealtor_query) === TRUE) {
               echo 'Realtor Permission saved successfully';
                header("Location: ../index.php?x=6");
           } else {
               echo 'Error: ' . $con->error;
               header("Location: ../index.php?x=55");
           }
        
    }
    
    function connectDB() {
       $con = mysqli_connect("localhost", "f14g21", "21mgrs2014", "student_f14g21");

        if (!$con) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        //set the default client character set
        mysqli_set_charset($con, 'utf-8');
        
        return $con;
    }

