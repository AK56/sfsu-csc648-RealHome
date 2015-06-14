<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>


<!DOCTYPE html>
 <div class="modal fade bs-example-modal-sm" id="ModalDenyRealtor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Deny Realtor</h4>
        </div>
        <div class="modal-body">
		<div class="alert alert-danger" role="alert">
                   You are about to deny a requesting member Realtor Status!</div>
<!-- Form Starts here -->
		<form class="form-editPage" role="form" enctype=multipart/form-data name="deleteRealtor" action="./Includes/processEditRealtor.php" method="POST">
                                <div class="form-group">
                                    <label for="InputRealtorToDelete">ID: </label>
                                    <input type="text" class="form-control" name="InputRealtorToDelete" placeholder="ID" readonly>
                                </div>
                          

                                <input type="hidden" name="editRealtor" value="2">
                                <button class="btn btn-lg btn-primary" type="submit">Deny Realtor </button>
                            </form>
<!-- Form Ends here -->	

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>