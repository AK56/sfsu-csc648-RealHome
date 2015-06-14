

<!DOCTYPE html>
 <div class="modal fade bs-example-modal-sm" id="ModalDeleteEntry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Delete Entry</h4>
        </div>
        <div class="modal-body">
		<div class="alert alert-danger" role="alert">
                    Warning! Deleting an Entry will permanently remove all its contents and data, Enter the ID of the Entry you wish to delete.</div>
<!-- Form Starts here -->
		<form class="form-editPage" role="form" enctype=multipart/form-data name="deleteEntry" action="index.php" method="POST">
                                <div class="form-group">
                                    <label for="InputEntryToDelete">ID: </label>
                                    <input type="text" class="form-control" name="InputEntryToDelete" placeholder="Enter ID">
                                </div>
                          


                                <button class="btn btn-lg btn-primary" type="submit">Delete!!!! </button>
                            </form>
<!-- Form Ends here -->	

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>