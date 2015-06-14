

<?php
/*
 * processRegister.php comes from the submission of the ModalRegister.html
 * Currently takes Email, pw1, pw2, phone, first name, last name, and is Realtor checkbox
 * Updates the users info into the database and Needs to show a Success window with index.php behind it
 * * NEED TO HAVE Already Registered Email page
 * Later we may have after a register the user will automatically be logged in.
 * 
 */
session_start();

    function SignUp() { 
        if(!empty($_POST['InputEmail'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
            { 
            //Connection
                $con = mysqli_connect("localhost", "f14g21", "21mgrs2014", "student_f14g21");
                if (!$con) {
                 exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
                }
                //set the default client character set
                mysqli_set_charset($con, 'utf-8');
                
                
                echo "echo test! Meaning most likely you entered an already Registered Email!";
                $query = $con->query("SELECT * FROM User WHERE email = '$_POST[InputEmail]'") or die(mysql_error()); 
                if(!$row = mysqli_fetch_array($query) or die(mysql_error())) 
                    {
                         $InputFirstName = $_POST['InputFirstName']; 
                         $InputLastName = $_POST['InputLastName']; 
                         $InputEmail = $_POST['InputEmail']; 
                         $InputPassword = $_POST['InputPassword'];
                         $InputPass2 = $_POST['InputPassword2'];
                         $InputPhone = $_POST['InputPhone'];
                         $Permissions = 0;
                           if(isset($_POST['InputRequestToBeRealtor']))
                           {
                                if ($_POST['InputRequestToBeRealtor'] == 'checked'){
                                   $Permissions = 1;
                              }
                           }
                           $query = "INSERT INTO User (firstName,lastName,email,password,phone,Permissions) VALUES ('$InputFirstName','$InputLastName','$InputEmail','$InputPassword','$InputPhone','$Permissions')"; 
                           $data = $con->query ($query)or die(mysql_error()); 
                           if($data) {                                  
                               header("Location: ../../index.php?x=1");
                              //YOUR REGISTRATION IS COMPLETED
                                      } 
                           } else {                           
                            echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
                      } 
                    } 
            }
if(isset($_POST['submit'])) 
{ 
    SignUp();
} ?>