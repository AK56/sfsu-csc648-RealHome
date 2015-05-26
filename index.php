<?php
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


    $my_query = "INSERT INTO Entry (price, address, city, state, zipCode, beds, baths, propertyType, size, description) VALUES ($InputPrice,'" . $InputAddress . "','" . $InputCity . "','" . $InputState . "',$InputZipCode,$InputBeds,$InputBaths ,'" . $InputPropertyType . "', $InputSize ,'" . $InputDescription . "')";


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
    header("Location: index.php");

    /* Make sure that code below does not get executed when we redirect. */
    exit;
}
//Below is for the Sell modal and should be put into another file
if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['SellFirstName']) {

    $SellFirstName = $_POST['SellFirstName'];
    $SellLastName = $_POST['SellLastName'];
    $SellEmail = $_POST['SellEmail'];
    $SellPhone = $_POST['SellPhone'];
    $SellAddress = $_POST['SellAddress'];
    $SellZipCode = $_POST['SellZipCode'];
    $SellNote = $_POST['SellNote'];
    

    $my_query_2 = "INSERT INTO Sell (firstName, lastName, email, phone, address, zipCode, notes) VALUES ('$SellFirstName', '$SellLastName', '$SellEmail', '$SellPhone', '$SellAddress', '$SellZipCode', '$SellNote')";

    $_SESSION['SellFirstName'] = $SellFirstName;
    $_SESSION['SellLastName'] = $SellLastName;
    $_SESSION['SellEmail'] = $SellEmail;
    $_SESSION['SellPhone'] = $SellPhone;
    $_SESSION['SellAddress'] = $SellAddress;
    $_SESSION['SellZipCode'] = $SellZipCode;
    $_SESSION['SellNote'] = $SellNote;


    if ($con->query($my_query_2) === TRUE) {
        echo 'users entry saved successfully';
    } else {
        echo 'Error: ' . $con->error;
    }

    /* Redirect browser */
    header("Location: index.php");

    /* Make sure that code below does not get executed when we redirect. */
    exit;
}
//Required for SearchBar
$search_term = "";
if (isset($_GET["s"])) {
    $search_term = trim($_GET["s"]);
    if ($search_term != "") {
        require_once(ROOT_PATH . "Includes/searchBarQueries.php");
        $entries = get_entries_search($search_term);
    }
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>RealHome: Global Group 21</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="dist/css/bootstrap-table.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>   
        <script type="text/javascript" language="javascript" charset="utf-8" src="dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" language="javascript" charset="utf-8" src="dist/js/bootstrap-table.min.js"></script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel='stylesheet' type='text/css'>

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- Please Name your Scripts! -->
        <script>
            function editFunction() {
                var radiocheck;
                var myPrice, myAddress, myCity, myState, myZipCode, myBeds, myBath, myPropertyType, mySize, myDescription;
                console.log("YO"+document.selectRadio.radiocheck );
                
                var len = document.selectRadio.radiocheck.length;
                
                var i;
                for (i = 0; i < len; i++) {
                    if (document.selectRadio.radiocheck[i].checked) {

                        radiocheck = document.selectRadio.radiocheck[i].value;
                        myPrice = document.selectRadio.myPrice[i].value;
                        myAddress = document.selectRadio.myAddress[i].value;
                        myCity = document.selectRadio.myCity[i].value;
                        myState = document.selectRadio.myState[i].value;
                        myZipCode = document.selectRadio.myZipCode[i].value;
                        myBeds = document.selectRadio.myBeds[i].value;
                        myBath = document.selectRadio.myBath[i].value;
                        myPropertyType = document.selectRadio.myPropertyType[i].value;
                        mySize = document.selectRadio.mySize[i].value;
                        myDescription = document.selectRadio.myDescription[i].value;

                        document.inputEntry.InputEntryToEdit.value = radiocheck;
                        document.inputEntry.InputPrice.value = myPrice;
                        document.inputEntry.InputAdress.value = myAddress;
                        document.inputEntry.InputCity.value = myCity;
                        document.inputEntry.InputState.value = myState;
                        document.inputEntry.InputZipCode.value = myZipCode;
                        document.inputEntry.InputBeds.value = myBeds;
                        document.inputEntry.InputBaths.value = myBath;
                        document.inputEntry.InputPropertyType.value = myPropertyType;
                        document.inputEntry.InputSize.value = mySize;
                        document.inputEntry.InputDescription.value = myDescription;

                        document.deleteEntry.InputEntryToDelete.value = radiocheck;
                        break;
                    }
                }
            }
        </script>
<!-- Then end the name of your script -->
    </head>

    <body>
        <!-- Nav bar thats called beginning of each Pages ie about.html, contact.html etc -->
        <?php include('Includes/navBar.html'); ?>
<!-- include all main modals -->
<?php include('Includes/modals/includeModals.php'); ?>
        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                    </p>
                    <div id="jumbo-top" class="jumbotron" style="background-color: #f8efc0">
                        <div height="5%" width="100%"style="margin-left: 30%"><br>
                            <br>
                            <p><img src="images/realhomelogo.png"  height="200" width="400"  alt="Image1" ><br><sub style="font-size: 30px; margin-left: 10%">Find Your Real Home here:</sub></p>
<!-- Displays For a Successful Registration! -->
<!-- Also Displays Failed Login Currently! -->
                            <p><?php if(isset($_GET["x"]))
                                {
                                    $x = $_GET["x"];
                                    if($x == 1)
                                    {
                                        echo " You are now Registered! "; // Subsitute for future autopop Success Modal
                                    } else if($x==2){
                                        echo "wrong Username and Password!"; // Subsitute for Wrong username and pw                                        
                                    } else if($x==4){
                                        echo " Listing Added!"; // temp
                                    } else if($x==5){
                                        echo " Realtor Granted ";
                                    } else if($x==6){
                                        echo " Realtor Denied ";
                                    } else if($x==55){
                                        echo " Not completed at this time. ";
                                    } else if ($x==69){
                                        echo " Your watched listings are below! ";
                                        $entries = $_SESSION['favorites'];
                                        echo $entries;
                                        $search_term = "hello";
                                        
                                    }
                                        
                                    
                                    }   ?></p>
<!-- End of Displays of Successful Registration and Failed Login -->
                        </div>

                        <br>
                        <br>
                        <!--/*RealHome logo uploaded and now take care of search label and form*/ -->

                    <!-- This includes processes the search bar and displays it! -->
                     <?php include('Includes/SearchResultsPanel.php'); ?>
                    </div> <!-- this div ends the jumbotron -->
                </div>
                <!--/row-->
            </div>
            <!--/span-->
        </div>
        <!--/row-->

        <footer>
            <p>&copy; SFSU/FAU/FULDA Software Engineering Project Fall, 2014. For Demonstration Only.</p>
        </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
