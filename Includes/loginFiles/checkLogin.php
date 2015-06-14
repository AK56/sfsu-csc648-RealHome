<?php
    //Processes ModalLogin form to check for correct Login and PW
    // Then redirects to index.php
    // once at index.php it should check for login status and display email as user name!

    define("ROOT_PATH", "/home/f14g21/public_html" . "/");
    define("BASE_URL", "/");
    define("DB_HOST", "localhost");
    define("DB_NAME", "student_f14g21");
    define("DB_PORT", "8889"); // default: 3306
    define("DB_USER", "f14g21");
    define("DB_PASS", "21mgrs2014");
    try {
            $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME .";port=" . DB_PORT,DB_USER,DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $db->exec("SET NAMES 'utf8'");
        } catch (Exception $e) {
            echo "Could not connect to the database. function get_entries_seach 1";
            exit;

        } 
  
    // username and password sent from form
    $myusername=$_POST['email'];
    $mypassword=$_POST['password'];
    


    // To protect MySQL injection (more detail about MySQL injection)
    /*
    $myusername = stripslashes($myusername);
    var_dump($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysqli_real_escape_string($myusername);
    var_dump($myusername);
    $mypassword = mysqli_real_escape_string($mypassword);
     * 
     */

    
    //New query testing 
    try { $results = $db->prepare("
                SELECT * 
                FROM User WHERE email like ? 
                and password like ?
                ORDER BY id");
        $results->bindValue(1,"%" . $myusername . "%");
        $results->bindValue(2,"%" . $mypassword . "%");
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database. searchBarQueries.php";
        exit;
    }
 

    // Mysql_num_row is counting table row
   $queryArrays= $results->fetchAll();
   //var_dump($queryArrays);
   $queryArray = $queryArrays[0];
   $accountID = $queryArray[0];
   $permissionNum = $queryArray[7];
//    echo "$ Count  1: ";
//    var_dump($accountID);
//    echo " Permission 2: ";
//    var_dump($permissionNum);
//    echo "|| end counts";

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($accountID > 0){

        // Register $myusername, $mypassword and redirect to file "login_success.php"
        session_start();
        $_SESSION['email']=$myusername;
        $_SESSION['password']=$mypassword;
        $_SESSION['permission']=$permissionNum;
        $_SESSION['id']=$accountID;
        echo "You are signed in! ";
        var_dump($myusername);
        var_dump($mypassword);
        var_dump($permissionNum);
        var_dump($accountID);
        
       //header("location:loginSuccess.php"); //CALL THIS WHEN TESTING!
      header("location:http://sfsuswe.com/~f14g21");
        
    }else {
        //"Wrong Username or Password";
        header("Location: ../../index.php?x=2");
    }
?>