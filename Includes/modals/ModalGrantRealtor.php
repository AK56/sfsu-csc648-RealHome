<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<div class="modal fade" id="ModalGrantRealtor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Grant Realtor</h4>
        </div>
		
		
		
                            
        <div class="modal-body">
            <form class="form-editPage" role="form" enctype=multipart/form-data name='inputRealtor' action="./Includes/processEditRealtor.php" method="POST">
                    
                    <div class="alert alert-info" role="alert">The ID of the Realtor you wish to edit. 
                        <div class="form-group">
                            <label for="InputRealtorToEdit">ID: </label>
                            <input type="text" class="form-control" name="InputRealtorToEdit" placeholder="Enter ID" value=""  readonly> 
                        </div>
                        
                                
                        </div> 

                    
                    <div class="form-group">
                                    <label for="InputEmail">Email </label>
                                    <input type="text" class="form-control" name="InputEmail" placeholder="Email" readonly>
                                </div>
                    
                                <div class="row">
                                    <div class="form-group col-xs-4">
                                        <label for="InputFirstName">First Name: </label>
                                        <input type="text" class="form-control" name="InputFirstName" placeholder="First Name" readonly>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="InputLastName">Last Name: </label>
                                        <input type="text" class="form-control" name="InputLastName" placeholder="Last Name" readonly>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="InputPhoneNumber">Phone Number: </label>
                                        <input type="number" class="form-control" name="InputPhoneNumber" placeholder="Phone" readonly>
                                    </div>


                                    <div class="form-group form-group col-xs-4">
                                        <label for="InputPermissionNum">Permission Number </label>
                                        <input type="number" class="form-control" name="InputPermissionNum" placeholder="Permission" readonly>
                                    </div>
    <!--                                <div class="form-group form-group col-xs-4">
                                        <label for="InputBeds">Number of Bedrooms: </label>
                                        <input type="number" class="form-control" name="InputBeds" placeholder="No. of Bedrooms">
                                    </div>
                                    <div class="form-group form-group col-xs-4">
                                        <label for="InputBaths">Number of Baths: </label>
                                        <input type="floatval" class="form-control" name="InputBaths" placeholder="No. of Baths">
                                    </div>-->       
                                </div>
                                
<!--                    <div class="row">
                                <div class="form-group col-xs-6">
                                    <label for="InputPropertyType">PropertyType: </label>
                                    <input type="text" class="form-control" name="InputPropertyType" placeholder="Property Type">
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="InputSize">Size: </label>
                                    <input type="number" class="form-control" name="InputSize" placeholder="Sq. Feet">
                                </div>
                    </div>
                                <div class="form-group">
                                    <label for="InputDescription">Description: </label>
                                    <input type="text" class="form-control" name="InputDescription" placeholder="Property Details">
                                </div>
                              
                                <div class="form-group">
                                    <label for="InputDescription">Upload a Property Picture: </label>
                                    <input type="file" class="form-control" name="InputPhoto"/>
                                    <input type="submit" name="submit" value="Upload" />
                                </div>
           -->
                          
                                

                                <input type="hidden" name="editRealtor" value="1">
                                <button class="btn btn-lg btn-primary" type="submit">Grant Realtor</button>
                            </form>
            
		
		<div class="btn-group-vertical">

	

</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

