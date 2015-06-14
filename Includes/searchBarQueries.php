<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<script>
console.log("Inside SearchBarQueries2");
</script> ';
function get_entries_search($s) {

     try {
	$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME .";port=" . DB_PORT,DB_USER,DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db->exec("SET NAMES 'utf8'");
    } catch (Exception $e) {
	echo "Could not connect to the database. function get_entries_seach 1";
	exit;

    } 
    
   // require("Includes/dbConnect.php");
    $Aid = array();
    $Aaddress = array();
    $AzipCode = array();
    $ApropertyType = array();
    $Acity = array();
    $Asize = array();
    $Aprice = array();
    $Atitle = array();
    $Abeds = array();
    $Abaths = array();
    $Adescription = array();
    $Astate = array();
    $Aphoto = array();
	$ACid = array();
    var_dump($db);
	
	

    try { $results = $db->prepare("
                SELECT id, address, zipCode, propertyType, city, size, price, beds, baths, description, state ,photo, creatorID
                FROM Entry
                WHERE city LIKE ?
                ORDER BY id");
        $results->bindValue(1,"%" . $s . "%");
        $results->execute();
       
        
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database. searchBarQueries.php";
        exit;
    }
    //$result = $conn->query($sql);
    $matches = $results->fetchAll(PDO::FETCH_ASSOC);
    //$matches = $dp->query($results);
    return $matches;
}
?>