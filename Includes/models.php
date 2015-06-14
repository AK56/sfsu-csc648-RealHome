
  <!-- Modal Login -->
  <div class="modal fade bs-example-modal-sm" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Login/Register</h4>
        </div>
		
        <div class="modal-body">
		
		<form class="form-editPage" role="form" enctype=multipart/form-data action="index.php" method="POST">
                                <div class="form-group">
                                    <label for="InputEmail">Email: </label>
                                    <input type="text" class="form-control" name="InputPrice" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Password: </label>
                                    <input type="password" class="form-control" name="InputAdress" placeholder="Enter Password">
                                </div>
                                


                                <button class="btn btn-lg btn-primary" type="submit">Login!</button>
                            </form>
							<a href="#ModalRegister" data-toggle="modal" data-dismiss="modal" ><h3>Click Here to Register!</h3></a>
							  <a class="btn btn-block btn-social btn-facebook">
								<i class="fa fa-twitter"></i> Sign in with Facebook
								</a>
								 <a class="btn btn-block btn-social btn-google">
								<i class="fa fa-twitter"></i> Sign in with Google
								</a>
	

		</div>

        </div>
    
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  
  
   !-- Modal Register -->
  <div class="modal fade bs-example-modal-sm" id="ModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Register</h4>
        </div>
		
        <div class="modal-body">
		
		<form class="form-editPage" role="form" enctype=multipart/form-data action="index.php" method="POST">
                                <div class="form-group">
                                    <label for="InputEmail">Email: </label>
                                    <input type="text" class="form-control" name="InputPrice" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Password: </label>
                                    <input type="password" class="form-control" name="InputAdress" placeholder="Enter Password">
                                </div>
								<div class="form-group">
                                    <label for="InputPassword">Password: </label>
                                    <input type="password" class="form-control" name="InputAdress" placeholder="Confirm Password">
                                </div>
								<div class="form-group">
                                    <label for="InputEmail">Phone Number: </label>
                                    <input type="text" class="form-control" name="InputPrice" placeholder="Phone Number">
                                </div>
								<div class="form-group">
                                    <label for="InputEmail">Full Name: </label>
                                    <input type="text" class="form-control" name="InputPrice" placeholder="Full Name">
                                </div>
                                <div class="checkbox">
									<label>
										<input type="checkbox"> Request to be Realtor
									</label>
								</div>


                                <button class="btn btn-lg btn-primary" type="submit">Register!</button>
                            </form>
					
	

		</div>

        </div>
    
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  

