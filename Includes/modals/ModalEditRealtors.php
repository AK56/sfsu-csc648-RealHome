<?php 
/*
 * This file Displays the Realtors Current Listings
 * Grabs the current session user ID, queries the data for listing of that ID
 * 3 buttons
 *  Add(aka Create), Edit, Delete
 */
    //session_start();
    if(isset($_SESSION["id"]))
    {
        
        $userID = $_SESSION["id"];
    } else {
        echo " Not set ";
    }

?>
<!DOCTYPE html>
<script>
            function editRealtors() {
                var radReal;
                var myEmail, myFirstName, myLastName, myPhoneNumber, myPermissionNum;
                console.log("Realtor"+document.edReals.radReal );
                
                var len = document.edReals.radReal.length;
                
                var i;
                for (i = 0; i < len; i++) {
                    if (document.edReals.radReal[i].checked) {

                        radReal = document.edReals.radReal[i].value;
                        myEmail = document.edReals.myEmail[i].value;
                        myFirstName = document.edReals.myFirstName[i].value;
                        myLastName = document.edReals.myLastName[i].value;
                        myPhoneNumber = document.edReals.myPhoneNumber[i].value;
                        myPermissionNum = document.edReals.myPermissionNum[i].value;


                        document.inputRealtor.InputRealtorToEdit.value = radReal;
                        document.inputRealtor.InputEmail.value = myEmail;
                        document.inputRealtor.InputFirstName.value = myFirstName;
                        document.inputRealtor.InputLastName.value = myLastName;
                        document.inputRealtor.InputPhoneNumber.value = myPhoneNumber;
                        document.inputRealtor.InputPermissionNum.value = myPermissionNum;

                        document.deleteRealtor.InputRealtorToDelete.value = radReal;
                        break;
                    }
                }
            }
        </script>
<div class="modal fade" id="ModalEditRealtors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">View Realtors </h4>
            </div>




            <div class="modal-body">

                <form action="" method="post" name="edReals">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1">
                    <thead>
                        <tr>
                            <!-- test table -->
                            <th>
                            </th>

                            <!--
                            <th data-field="state" data-radio="true" >ID</th>
                            -->
                            <th>ID</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysqli_connect("localhost", "f14g21", "21mgrs2014");
                        if (!$con) {
                        exit('Connect Error (' . mysqli_connect_errno() . ') '
                        . mysqli_connect_error());
                        }
                        //set the default client character set
                        mysqli_set_charset($con, 'utf-8');

                        mysqli_select_db($con, "student_f14g21");


                        $result = mysqli_query($con, "SELECT * FROM User WHERE Permissions = 1");
                      
                        $count = 0;
                        while ($row = mysqli_fetch_array($result)) {
                                $radioID =  $row["id"];
                                $myEmail = $row["email"];
                                $myFirstName = $row["firstName"];
                                $myLastName = $row["lastName"];
                                $myPhoneNumber = $row["phone"];
                                $myPermissionNum = $row["Permissions"];
                                
                                ?>     
                            <td>
                                <input type='radio' name='radReal' value= "<?php echo $radioID ?>"> 
                                <input type='hidden' name='myEmail' value= "<?php echo $myEmail ?>"> 
                                <input type='hidden' name='myFirstName' value= "<?php echo $myFirstName ?>"> 
                                <input type='hidden' name='myLastName' value= "<?php echo $myLastName ?>"> 
                                <input type='hidden' name='myPhoneNumber' value= "<?php echo $myPhoneNumber ?>"> 
                                <input type='hidden' name='myPermissionNum' value= "<?php echo $myPermissionNum ?>"> 

                            </td>

                            <?php 
                            echo "	<td>" . htmlentities($row["id"]) . "</td> ";
                            echo "	<td>" . htmlentities($row["email"]) . "</td> ";
                            echo "	<td>" . htmlentities($row["firstName"]) . "</td> ";
                            echo "	<td>" . htmlentities($row["lastName"]) . "</td> ";
                            echo "	<td>" . htmlentities($row["Permissions"]) . "</td> ";
                            echo "	</tr> ";

                            $count = $count + 1;
                    }
                    mysqli_free_result($result);
                    ?>

                    <div id="log"></div>
                    </tbody>

                </table>

                <div class="btn-group-horizontal">
                    
                    <button type="button" href="#ModalGrantRealtor" data-toggle="modal" data-dismiss="modal" class="btn btn-default btn-lg" name="grantRealtor" onclick="editRealtors()">
                        <span class="glyphicon glyphicon-plus"></span> Grant Realtor
                    </button>

                    
                        <button type="button" href="#ModalDenyRealtor" data-toggle="modal" data-dismiss="modal" class="btn btn-default btn-lg" name="denyRealtor" onclick="editRealtors()" >
                            <span class="glyphicon glyphicon-minus"></span> Deny Realtor
                        </button>


                        <!-- <form action="#ModalDeleteEntry" method="get">
                               <button type="button"  data-toggle="modal" data-dismiss="modal" class="btn btn-default btn-lg" value="">
                                  <span class="glyphicon glyphicon-minus"></span> Delete Entry
                              </button>
                        -->

                </div>
                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>