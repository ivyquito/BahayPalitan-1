
    <div id="login_box" style="padding-top:10px">
    <div class="container">
		 <div class="container-fluid">
			<div class="container">
				<div class="container-page">				
					<div class="col-md-8 col-md-offset-2">
					<div class="login-panel panel panel-default">
                    <div class="panel-heading">
						<h3 class="dark-grey">Registration - Step 1</h3>
					</div>
						<div class="panel-body">
                        <form action="<?php echo base_url(); ?>user_signup" class="form-signin" method="post" accept-charset="utf-8">
						<fieldset>
							<div class="form-group">
                                    <p class="err"><?php echo (isset($error) ? $error : '');?></p>
                            </div>
							<div class="form-group col-lg-6">
								<label>First Name</label>
								<input type="text" name="fname" class="form-control" value="<?php echo (isset($_POST['fname']) ? $_POST['fname'] : ''); ?>" required>
							</div>
							<div class="form-group col-lg-6">	
								<label>Middle Name</label>
								<input type="text" name="mname" class="form-control" value="<?php echo (isset($_POST['mname']) ? $_POST['mname'] : ''); ?>" required>
							</div>
							<div class="form-group col-lg-6">
								<label>Last Name</label>
								<input type="text" name="lname" class="form-control" value="<?php echo (isset($_POST['lname']) ? $_POST['lname'] : ''); ?>" required>
							</div>
							<div class="form-group col-lg-6">
								<label>gender</label>
								<select class="form-control" name="gender" required>
									<option value=""></option>
									<option value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] =='male' ? 'selected' : ''); ?>>Male</option>
									<option value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] =='female' ? 'selected' : ''); ?>>Female</option>
								</select>
							</div>
							
							<div class="form-group col-lg-6">
								<label>Birth Date</label>
								<input id="birthdate" name="birthdate" class="form-control" type="date" placeholder="" required="" value="<?php echo (isset($_POST['birthdate']) ? $_POST['birthdate'] : ''); ?>">
							</div>
							<div class="form-group col-lg-6">
								<label>Email Address</label>
								<input type="email" name="email" class="form-control" id="" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : ''); ?>" required>
							</div>
							<div class="form-group col-lg-6">
								<label>Contact No.</label>
								<input type="text" name="contact" class="form-control" id="" value="<?php echo (isset($_POST['contact']) ? $_POST['contact'] : ''); ?>" required>
							</div>
							<div class="form-group col-lg-6">
								<label>Username</label>
								<input type="text" name="uname" class="form-control" id="" value="<?php echo (isset($_POST['uname']) ? $_POST['uname'] : ''); ?>" required>
							</div>
							<div class="form-group col-lg-6">
								<label>Password</label>
								<input type="password" name="password" class="form-control" id="" value="" required>
							</div>
							
							<div class="form-group col-lg-6">
								<label>Repeat Password</label>
								<input type="password" name="confirm" class="form-control" id="" value="" required>
							</div>
							<div class="form-group col-lg-12 col-md-offset-5">
								<a href="http://localhost/bahaypalitan/"><button class="btn btn-defualt" type="button">Back</button></a>
								<input type="submit" name="register" class="btn btn-primary" id="" value="Next">
							</div>
						</fieldset>
						</form>						
						</div>				
					</div>	
					</div>
				</div>
			</div>
		</div>
		
    </div>
    </div>