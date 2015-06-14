<!-- Start of Search Form and Panels! -->    
                        <!-- <form class="form-horizontal " action="./"> 
   value="<?php echo htmlspecialchars($search_term); ?>" --- in input name="search"
  --><a name="SearchResultsAnchor"></a>
      <form class="form-horizontal " action="./" >
          <div id="address-form" class="form-group" >
              <label for="address" class="col-sm-2 control-label"></label> 
                 <div class="input-group col-sm-8 col-md-8 col-lg-8" style="margin-left: 30%">
                    <p><input type="text" class="form-control " name="s" value="<?php echo htmlspecialchars($search_term); ?>" id="address" style ="width: 47%" placeholder="Enter City, Zip code">
                          <span class="input-group-btn" >
                        <button type="submit" value="Go"  class="btn btn-default">Search</button>
                           </span>
                      </p>
                  </div>
            </div>             
         </form>
  
  
    <?php // if a search has been performed ... ?>
                        
    <?php if ($search_term != "") : ?>
                            
    <?php // if there are Listings found that match the search term, display them; ?>
    <?php // otherwise, display a message that none were found ?>
    <?php if (!empty($entries)) : ?>
    <?php // var_dump($entries); ?>
  
    <?php
    // the following arrays holds the associated values for all entries. Like $Aid holds the id of each entry
        $Aid = array();
        $Aaddress = array();
        $AzipCode = array();
        $ApropertyType = array();
        $Acity = array();
        $Asize = array();
        $Aprice = array();
        //$Atitle = array();
        $Abeds = array();
        $Abaths = array();
        $Adescription = array();
        $Astate = array();
        $Aphoto = array();
        $ACid = array();
//                        foreach ($entries as $entry) {
//                            include(ROOT_PATH . "Includes/SearchResultsPanel.php");
//                            } 
        // entries as an array, which holds all the entries in DB
        if (count($entries) > 0) {
            // output data of each row

            for ($j = 0; $j < count($entries); $j++) {
                // here we make row as the current entry: entry[Entry No. in DB]
                $row = $entries[$j];
                // push the respective values of each Entry to respective arrays declared above
                array_push($Aid, $row["id"]);
                array_push($Aaddress, $row["address"]);
                array_push($AzipCode, $row["zipCode"]);
                array_push($ApropertyType, $row["propertyType"]);
                array_push($Acity, $row["city"]);
                array_push($Asize, $row["size"]);
                array_push($Aprice, $row["price"]);
                // array_push($Atitle, $row["title"]);
                array_push($Abeds, $row["beds"]);
                array_push($Abaths, $row["baths"]);
                array_push($Adescription, $row["description"]);
                array_push($Astate, $row["state"]);
                array_push($Aphoto, $row["photo"]);
                array_push($ACid, $row["creatorID"]);
            }
            ?>
  
    <?php
        
        require_once 'Includes/userClass.php';
        // test
        $usr2 = new User();
        $arrayOfRealtors = array();
        // get all the Realtors in DB
        $arrayOfRealtors = $usr2->getRealtorsInfo();
        //$usr2->getRealtorsInfo();
        // show the final variables

        //var_dump($array);
        //$varLOL =array_pop($array);

        echo'<br><br>

        ';?>


        <!--Start of the Listings Thumbnail  -->
  <div class="panel panel-default"> 
      <div class="panel-heading"><b>Here are the Results. Click on the left side of list to see the details</b></div>
        <div class="panel-body" >
           <!--div class="container-fluid" --> <!-- Mark DEL>
               
               <!-- The following div comes before jumbotron-->
              <div class="col-md-3" > <!--This is the left side of listings thumbnail-->
                 <!--<div class="list-group" style ="background-color: beige"-->

                <script>
                console.log("Script");
                window.location.hash = "SearchResultsAnchor";
                </script>

                   <?php
                      for ($i = 0; $i < count($Aid); $i++) {
                         $locationOfRealtorInArray = 0;

              //get location in array that matches ID of the entry
              //echo'<script> console.log("locationOfRealtorInArray= '.count($arrayOfRealtors).'"); </script>';
                          $counting = count($arrayOfRealtors);
                          for ($j = 0; $j < $counting; $j++) 
                          {
                                    //echo'<script> console.log("locationOfRealtorInArray= '.$locationOfRealtorInArray.' j= '.$j.'  counting= '.$counting.' $arrayOfRealtors[$j]id->= '.$arrayOfRealtors[$j]->id.' $Aid[$i]= '.$ACid[$i].'"); </script>';

                              if ($arrayOfRealtors[$j]->get_id() == $ACid[$i]) 
                                  {
                                 $locationOfRealtorInArray = $j;
                     ?>
                
                  <script> //console.log($j); // var aidID = '<?php //echo $locationOfRealtorInArray  ?>'; 
                  </script>
                                        <!--                                                                                                                        <!--<form action=="" meth="GET" name="testAJAX" >
                                                                                                                                                                 </form> -->
                   <?php //Script 1
                    $loopSpot = $i;
                    break;
     //  document.getElementById("id").innerHTML = $locationOfRealtorInArray;
     //echo'<script> console.log("locationOfRealtorInArraySUCCESSFOUND= '.$locationOfRealtorInArray.'"); </script>';
                                  }
                            }
												

   echo ' <script> ';
   echo '  function myFunction' . $i . '() {  ';

   echo '   document.getElementById("address2").innerHTML = "' . $Aaddress[$i] . '[' . $Aid[$i] . ' ]";  ';
   echo ' document.cookie = "ListID=' . $Aid[$i] . '"; ';
   echo '   document.getElementById("zipCode2").innerHTML = "Zip: ' . $AzipCode[$i] . ' ";  ';
   echo '   document.getElementById("propertyType2").innerHTML = "Property Type: ' . $ApropertyType[$i] . ' ";  ';
   echo '   document.getElementById("city1").innerHTML = "City: ' . $Acity[$i] . ' ";  ';
   echo '   document.getElementById("size1").innerHTML = "Size: ' . $Asize[$i] . ' Sq. Feet";  ';
   echo '   document.getElementById("price1").innerHTML = "Price: $' . $Aprice[$i] . ' ";  ';

   echo '   document.getElementById("beds1").innerHTML = "Bedrooms: ' . $Abeds[$i] . ' ";  ';
   echo '   document.getElementById("baths1").innerHTML = "Bathrooms: ' . $Abaths[$i] . ' ";  ';
   echo '   document.getElementById("description1").innerHTML = "    ' . $Adescription[$i] . ' ";  ';
   echo '   document.getElementById("state1").innerHTML = "State: ' . $Astate[$i] . ' "; 

	document.getElementById("RealtorName").innerHTML = " ' . $arrayOfRealtors[$locationOfRealtorInArray]->get_firstName() . ' ' . $arrayOfRealtors[$locationOfRealtorInArray]->get_lastName() . ' "; 
        document.getElementById("RealtorPhone").innerHTML = "Phone: ' . $arrayOfRealtors[$locationOfRealtorInArray]->get_phone() . '  "; 
	document.getElementById("RealtorEmail").innerHTML = "Email: ' . $arrayOfRealtors[$locationOfRealtorInArray]->get_email() . '  "; 
	document.getElementById("RealtorPhoto").src = "' . $arrayOfRealtors[$locationOfRealtorInArray]->get_photo() . '"; 
	';
															
															
															
   echo ' } ';
   echo ' console.log("Function Called"); </script> ';
   // the following displays the left side of thumbnail 
   echo ' <a  class="list-group-item" onclick="myFunction'. $i .'()"> 
           
		     <img class="pull-left" src="' . $Aphoto[$i] . '" height="150" width="100%">
		     <p><h4> ' . $Aaddress[$i] . '<br>
                          ' . $Acity[$i] . ', '. $Astate .' </h4>
                     <h5>Price: $' . $Aprice[$i] . '<br>' . $Abeds[$i] . ' Beds,  ' . $Abaths[$i] . ' Baths' .'</h5></p>
                    
              
            </a>  ';
          } // end of first for loop
          ?> <!-- end of Script 1-->  
                 <!--/div--Left Side of thumbnail ends here-->
                </div>            
                <!--Right Side of Thumbnail Starts here-->
                    <div class="col-md-8" style="width: 75%">       
                       <div class="jumbotron">
													
                            <div class="container-fluid">
                                
                                    <div class="row">
                                      <div class="col-md-8">
				      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style ="background-color: beige; height: 300px; width: 400px">
                                        <!-- Indicators -->
                                       <ol class="carousel-indicators">
                                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>

                                <!-- Wrapper for slides, the pics of listings -->
                                            <div class="carousel-inner" role="listbox" style="height: 300px; width: 400px">
                                                <div class="item active">
                                                  <img src="images/IMG_4584.JPG" alt="This pic 1">
                                                  <div class="carousel-caption">
                                                    This is the first picture of the house
                                                  </div>
                                                </div>
                                                <div class="item">
                                                  <img src="images/IMG_4585.JPG"   alt="This pic 2">
                                                  <div class="carousel-caption">
                                                    This is the second picture of the house
                                                  </div>
                                                </div>
                                                    <div class="item">
                                                  <img src="images/ModHouse2.jpg"  alt="This pic 3">
                                                  <div class="carousel-caption">
                                                    This is the third picture of the house
                                                  </div>
                                                </div>
                                              </div>
                                         

                                     <!-- Controls -->
                                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                            </div> <!--Pics ends here-->
                                            
                                            <br>
                                                <div class="alert alert-success" style="width: 400">  
                           <h4 id="address2" align="center" >Address</h4>
                           
			   <button type="button" id="watchButton"  onclick="watchButtonClick()" class="btn btn-primary btn-lg inline" >Watch This Entry!
                           </button>
                           
                           <button type="button" id="watchButton"  onclick="watchButtonClick()" class="btn btn-primary btn-lg inline">Save Favorite
                           </button> 
                          </div> 
                                      </div>
                                        
                                        
                                            <div class="col-md-4">
                                       <div class="panel panel-info" >
                                           <div class="panel-heading">Realtor Info:</div>
                                            <h4 align="center" id="RealtorName">Llam Aington</h4>
                                            <img id="RealtorPhoto" src="images/camel4.jpg" height="150" width ="200"class ="center-block"  alt="This pic 1"><br>
                                            <p id="RealtorEmail" align ="center">Email: Imnotallama@hotmale.com</p>
                                                <p id="RealtorPhone" align ="center">Phone: 492-4903-4822</p>
                                            <button type="button" align="center" class="btn btn-primary center-block">Contact the Realtor</button>
                                         </div>
                                    </div>
                                  </div>       <!--Top Row ends here, Pics, Realtor info and Save/Watch Button-->
                                          
                                <!--The second row starts here: -->
                                 <div class="row">
                                      <div class="col-md-6">     
                                         <div class="panel panel-info">
                                             <div class="panel-heading">Basic Information</div>
                                              <h5 id="propertyType2">Address</h5>
                                              <h5 id="propertyType2">Property Type</h5>
                                              <h5 id="beds1">Beds</h5>
                                              <h5 id="baths1">Baths</h5>
                                              <h5 id="size1">Size</h5>
                                              <h5 id="price1">Price</h5>
                                              <h5 id="zipCode2">Zipcode</h5>
                                              <h5 id="state1">State</h5>
                                              <h5 id="city1">City</h5> 
                                           </div>
                                         </div>
                                        
                                         <div class="col-md-6">
                                            <div class="panel panel-info">
                                               <div class="panel-heading">More Description</div>
                                               <h5 id="description1">About this house</h5>
                                             </div>
                                          </div>
                                      </div>	
					<!--Second Row Ends-->
                                    
                                </div>
                            </div>                                                                                                                                                               
                           <script>
                                function watchButtonClick() {
                                 console.log("Inside watchButtonClick");
                                 $testNum = document.cookie[10] + document.cookie[11];
                                 var mystring = "crt/r2002_2";
                                 $testNum = $testNum.replace(';','');
                                 console.log($testNum);
            <?php //echo $Aid[$loopSpot];  ?>
                                                   //document.getElementById("id");
                                  $.get('\Includes/processAddFavorites.php', {id : $testNum}, function(data) 
                                  {
                             //here you would write the "you ve been successfully subscribed" div
                                   });
                                  document.cookie = "ListID=; expires=Thu, 01 Jan 1970 00:00:00 UTC";   
                                  if (document.getElementById("watchButton").className.match("btn btn-primary"))
                                  {
                                  document.getElementById("watchButton").className = "btn btn-success btn-lg inline";
                                  document.getElementById("watchButton").innerHTML = "Unwatch This Entry";
                                  }
                                  else
                                  {
                                  document.getElementById("watchButton").className = "btn btn-primary btn-lg inline";
                                  document.getElementById("watchButton").innerHTML = "Watch This Entry!";
                                   }
                                       }
                               </script>
                            </div>     
                          </div> 
                       
                      </div>
                    
  
        <?php
          } else {
              echo "0 results*** Steve";
          }
        ?>                                                                      
        <?php else: ?>                      
            <p>No Entries were found matching that search term. Loaded original, unfiltered results!</p>
            <?php echo "No Results Found!"; ?>
            <?php include('Includes/RecentSoldPanel.html'); ?>                                    
            <?php endif; ?>
            <?php else: ?>
                <?php include('Includes/RecentSoldPanel.html'); ?> 
            <?php endif; ?>
<!-- End of Search Form and Panels! -->   